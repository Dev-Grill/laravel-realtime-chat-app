<template>
    <div>
        <div v-if="userStore.userTalkingTo != null" class="mesgs">
            <div class="msg_history">
                <div v-for="message in messagesStore.conversations">
                    <div class="incoming_msg" v-if="message.sender_id == userStore.authUser.id">
                        <div class="incoming_msg_img"> 
                            <img src="/logo.png" alt="sunil"> 
                        </div>
                        <div class="received_msg">
                            <div class="received_withd_msg">
                            <p>{{message.message}}</p>
                            <span class="time_date"> 11:01 AM    | June 9</span></div>
                        </div>
                    </div>
                    <div class="outgoing_msg" v-if="message.sender_id != userStore.authUser.id">
                        <div class="sent_msg">
                            <p>{{message.message}}</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="type_msg">
                <div class="input_msg_write">
                    <input @keyup.enter="sendChat" v-model="messageText" type="text" class="write_msg" placeholder="Type a message" />
                    <button @click="sendChat" class="msg_send_btn" type="button"><i class="fa fa-paper-plane" aria-hidden="true"></i></button>
                </div>
            </div>
        </div>
        <div v-if="userStore.userTalkingTo == null" class="mesgs">select user to chat with </div>
    </div>
</template>

<script>

    import {mapState} from "vuex"
        
    export default {
        
        data() {
            return {
                friendsList: [],
                messageText: ''
            }
        },
		
		computed: {
            ...mapState({
                userStore: state => state.userStore,
                messagesStore: state => state.messagesStore
			})
        },

        sockets: {
			new_chat_sent: function(data) {
                var new_message = JSON.parse(data)
                console.log(new_message.receiver_id, this.userStore.authUser.id, 'data nad auwht')
                if(new_message.receiver_id == this.userStore.authUser.id){
                    this.messagesStore.conversations.push(new_message)
                }
			}
    	},
    
        methods: {

			sendChat() {

				if (!this.messageText == '') {

                    var message_data = {
                        sender_id: this.userStore.authUser.id,
                        receiver_id: this.userStore.userTalkingTo.id,
                        message: this.messageText
                    }

                    this.messagesStore.conversations.push(message_data)
					this.$store.dispatch('sendPrivateMessage', message_data);
                    
                    this.messageText = ''
                    
					var elem = $('.msg_history');
					elem.animate({ scrollTop: elem.prop("scrollHeight")}, 100);
                }
                else{
                    alert('you cant send empty message')
                }
            }
        }
    }
</script>
