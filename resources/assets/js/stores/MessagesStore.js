import axios from "axios"
import { getUserConversations, getHeader } from '../helpers'

const state = 
{
	conversations: [],
}

const mutations = {
	
	SET_USER_CONVERSATIONS (state, messages) {
		state.conversations = messages
	}
}

const actions = {

	getUserConversations: ({commit}, data) => {
        return axios.post(getUserConversations, data, {headers: getHeader()})
		.then
		(
			response => {
                commit('SET_USER_CONVERSATIONS', response.data) 
			}
        )
    },
}

export default {
	state, mutations, actions
}

