<template>
	<div class="inbox_people">
		<div class="headind_srch">
			<div class="recent_heading">
				<h4>Welcome: {{userStore.authUser.name}}</h4>
			</div>
	  	</div>
		<div class="inbox_chat scroll">
			<div v-for="user in filteredUserList" class="chat_list active_chat">
				<div v-if="user.id != userStore.authUser.id" class="chat_people" @click="getUserMessages(user)">
					<div class="chat_img"> 
						<img src="/logo.png" alt="sunil"> 
					</div>
					<div class="chat_ib">
						<h5>{{user.name}}</h5>
					</div>
				</div>
			</div>
		</div>
	</div>
</template>

<script>

	import {mapState} from "vuex"
	
    export default {
		props: [
		],

		data() {
            return {
                friendsList: []
            }
        },
		
		computed: {
			...mapState({
                userStore: state => state.userStore
			}),
			filteredUserList() {
 				return this.friendsList.filter(user => {
 			    	return user.name != this.userStore.authUser.name
 				})
 			}
		},

		methods: {
			getUserMessages(user){
				this.$store.dispatch('getUserConversations', {
					auth_user_id: this.userStore.authUser.id,
					user_id: user.id
				})
				this.$store.dispatch('updateUserTalkingTo', user)
				
				var elem = $('.msg_history');
				elem.animate({ scrollTop: elem.prop("scrollHeight")}, 100);
			},
			logout(){
				this.$store.dispatch('checkAuthUser', "null");
			}
		},

		mounted() {
			this.friendsList = this.userStore.userChatList
		},

		sockets: {
			new_user_joined_event: function(data) {
				this.friendsList = JSON.parse(data)
			}
    	}		
    }
</script>
