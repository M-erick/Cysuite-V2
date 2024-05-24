import axios from 'axios';

const state = {
    issues: [],
    selectedIssue: null,
    responses: [],
};

const mutations = {
    setIssues(state, issues) {
        state.issues = issues;
    },
    setSelectedIssue(state, issue) {
        state.selectedIssue = issue;
    },
    setResponses(state, responses) {
        state.responses = responses;
    },
    setUserForIssue(state, { issueId, user }) {
        const issue = state.issues.find(issue => issue.id === issueId);
        if (issue) {
            issue.user = user;
        }
    },
};

const actions = {
    async fetchIssues({ commit, dispatch }) {
        try {
            const response = await axios.get('/api/issues');
            const issues = response.data;
            commit('setIssues', issues);

            // Fetch user details for each issue
            for (const issue of issues) {
                await dispatch('fetchUser', issue);
            }
        } catch (error) {
            console.error('Error fetching issues:', error);
        }
    },
    async fetchIssueResponses({ commit }, issueId) {
        try {
            const response = await axios.get(`/api/issues/${issueId}/responses`);
            commit('setResponses', response.data);
        } catch (error) {
            console.error('Error fetching responses:', error);
        }
    },
    async fetchUser({ commit }, issue) {
        try {
            const response = await axios.get(`/api/users/${issue.user_id}`);
            commit('setUserForIssue', {
                issueId: issue.id,
                user: response.data,
            });
            console.log(`Fetched User for Issue ${issue.id}:`, response.data);
        } catch (error) {
            console.error('Error fetching user:', error);
        }
    },
};

const getters = {
    filteredIssues: (state) => (searchQuery) => {
        return state.issues.filter(issue =>
            issue.description.toLowerCase().includes(searchQuery.toLowerCase())
        );
    },
};

export default {
    namespaced: true,
    state,
    mutations,
    actions,
    getters,
};
