export const getHeader = function () 
{
	const headers = {
		'Access-Control-Allow-Origin': '*',
		'Content-Type': 'application/json',
	}
	
	return headers
}

export const baseUrl = "http://127.0.0.1:8000/api";
export const socketPORT = "6999"

export const getUsers = baseUrl + "/users"
export const getUserConversations = baseUrl + "/chats"
export const saveConversation = baseUrl + "/save-conversation"
export const createUser = baseUrl + "/create"