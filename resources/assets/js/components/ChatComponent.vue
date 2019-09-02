<template>
	<div class="messaging">
		<div class="auth_con" v-if="userStore.authUser == null">
			<h2>Welcome to Vuejs Laravel One on One Chat Application</h2>
			<h5>Enter Username to join</h5>
			<input @keyup.enter="adduserToChatRoom" v-model="chat_name" type="text" class="write_msg" placeholder="enter a random name" />
			<button @click="adduserToChatRoom">Join</button>
		</div>
		<div v-if="userStore.authUser != null" class="inbox_msg">
			<chat-inbox-component></chat-inbox-component>
			<chat-message-component></chat-message-component>
		</div>
	</div>
</template>

<script>

	import {mapState} from "vuex"
	
	export default {
		
		data() {
			return {
				chat_name: ''
			}
        },
		computed: {
        	...mapState({
            	userStore: state => state.userStore
        	}),
    	},
		methods: {
			adduserToChatRoom() {
				if (!this.chat_name == '') {
					this.$store.dispatch('createNewUser', this.chat_name);
					this.$store.dispatch('preUpdateAuthUser', {name: this.chat_name});					
				}
				else{
					alert('you need a name for the chat room')
				}
            }
		},
	}
</script>
