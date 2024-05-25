<template>
    <div>
      <h1>Manage Issues</h1>
      <div v-if="issues.length">
        <div v-for="issue in issues" :key="issue.id" class="issue">
          <h3>{{ issue.title }}</h3>
          <p>{{ issue.description }}</p>
          <p>Status: {{ issue.status }}</p>
          <div v-if="issue.response">
            <h4>Response</h4>
            <p>{{ issue.response }}</p>
          </div>
          <div v-else>
            <form @submit.prevent="submitResponse(issue.id)">
              <textarea v-model="responses[issue.id]" placeholder="Write a response"></textarea>
              <button type="submit">Submit Response</button>
            </form>
          </div>
          <button @click="markAsResolved(issue.id)" :disabled="issue.status === 'resolved'">Mark as Resolved</button>
        </div>
      </div>
    </div>
  </template>

  <script>
  import { ref, onMounted } from 'vue';
  import axios from 'axios';

  export default {
    setup() {
      const issues = ref([]);
      const responses = ref({});

      const fetchIssues = async () => {
        const response = await axios.get('/api/issues');
        issues.value = response.data;
      };

      const submitResponse = async (issueId) => {
        const responseText = responses.value[issueId];
        await axios.post(`/api/issues/${issueId}/respond`, { response: responseText });
        fetchIssues(); // Refresh issues after response
      };

      const markAsResolved = async (issueId) => {
        await axios.post(`/api/issues/${issueId}/resolve`);
        fetchIssues(); // Refresh issues after marking as resolved
      };

      onMounted(() => {
        fetchIssues();
      });

      return { issues, responses, submitResponse, markAsResolved };
    },
  };
  </script>

  <style scoped>
  .issue {
    border: 1px solid #ccc;
    padding: 1em;
    margin: 1em 0;
  }
  </style>
