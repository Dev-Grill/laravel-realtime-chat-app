var app = require('express')();
var server = require('http').Server(app);
var io = require('socket.io')(server);
var redis = require('redis');
require('dotenv').config()

const APP_PORT = process.env.NODE_APP_PORT

server.listen(APP_PORT, () => {
	console.log("Server running at " + APP_PORT);
});

io.on('connection', function (socket) {

	console.log('Client connected');

	var redisClient = redis.createClient();

	redisClient.subscribe('new_user_joined_event');
	redisClient.subscribe('new_chat_sent');

	redisClient.on("message", function (channel, message) {
		socket.emit(channel, message);
	});

	redisClient.on('disconnect', function () {
		redisClient.quit();
	});
});
