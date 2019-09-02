import Vue from 'vue'
import axios from "axios"
import { getHeader, createUser, getUsers } from '../helpers'

const state = 
{
	authUser: null,
	userTalkingTo: null,
	userChatList: []
}

const mutations = {
	SET_USER_CHAT_LIST (state, user) {
		state.userChatList = user
	},
	SET_AUTH_USER (state, user) {
		state.authUser = user
	},
	SET_USER_TAKLING_TO (state, user) {
		state.userTalkingTo = user
	}
}

const actions = {

	getChatList: ({commit}, user) => {
    	commit('SET_USER_CHAT_LIST', JSON.parse(user))
	},

	updateChatList: ({commit}, user) => {
    	commit('SET_USER_CHAT_LIST', user)
	},

	checkAuthUser: ({commit}, user) => {
		if(user != "null"){
			return axios.get(getUsers, {headers: getHeader()})
			.then
			(
				response => {
					commit('SET_AUTH_USER', user)
					commit('SET_USER_CHAT_LIST', response.data)
				}
			)
		}
	},

	preUpdateAuthUser: ({commit}, user) => {
		commit('SET_AUTH_USER', user)
	},

	createNewUser: ({commit}, data) => {

		let postData = {
			name: data
		}
		
		return axios.post(createUser, postData, {headers: getHeader()})
		.then
		(
			response => {
				localStorage.setItem("auth_user", JSON.stringify(response.data));
				commit('SET_AUTH_USER', response.data)
			}
		)
	},

	updateUserTalkingTo: ({commit}, user) => {
		commit('SET_USER_TAKLING_TO', user)
	}
}

export default {
	state, mutations, actions
}

