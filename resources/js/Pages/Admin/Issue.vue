<template>
    <AuthenticatedLayout>
        <!-- try to implement this as a messaging system:facebook feeds -->
        <div class="container mx-auto shadow-lg rounded-lg">
            <!-- Chatting -->
            <div class="flex flex-row justify-between bg-white">
                <!-- chat list: i'll loop through issues and response from my issue  and Response table -->
                <div class="flex flex-col w-2/5 border-r-2 overflow-y-auto">
                    <!-- search component -->
                    <div class="border-b-2 py-4 px-2" style="background-color:#046a5b ;">
                        <span  class="text-white">Issue Page</span>
                    </div>
                    <!-- user list: Fetch the user details from the database -->
                    <div v-for="issue in filteredIssues" :key="issue.id"
                        class="flex flex-row py-4 px-2 items-center border-b-2 cursor-pointer"
                        @click="selectIssue(issue)" :class="{ 'selected-issue text-white ': isSelected(issue) }">
                        <div class="w-1/4 mr-2">
                            <div
                                class="h-12 md:h-16 w-12 md:w-16 rounded-full border-2 border-gray-300 flex items-center justify-center">
                                <i class="fa-solid fa-user text-2xl md:text-4xl"></i>
                            </div>
                        </div>
                        <div class="w-full">
                            <div class="text-lg font-semibold">{{ issue.title }}</div>
                            <span>{{ issue.description }}</span>
                        </div>
                    </div>
                </div>


                <!-- end chat list -->
                <!-- message -->
                <div class="w-full px-5 flex flex-col justify-between">
                    <div v-if="selectedIssue" class="flex flex-col mt-5">
                        <div v-for="response in responses" :key="response.id"
                            :class="{'justify-end': response.user_id === currentUser.id, 'justify-start': response.user_id !== currentUser.id}"
                            class="flex mb-4">


                            <span>Admin@{{ response.user_id }}</span>
                            <div
                                class="relative mr-2 py-3 px-4 bg-green-900 rounded-bl-3xl rounded-tl-3xl rounded-tr-xl text-white">
                                {{ response.response_text }}
                                <span
                                    class="absolute bottom-0 left-0 text-xs text-gray-400 transform translate-y-full">{{
                                    formatTimestamp(response.created_at) }}</span>
                            </div>
                        </div>

                        <!-- response part:loop through the response  and replies-->


                    </div>
                    <div v-else class="flex justify-center items-center h-full">
                        <p class="text-gray-500">Select an issue to view details</p>
                    </div>
                    <div class="py-5">
                        <form @submit.prevent="submitResponse">
                            <input v-model="newResponse" class="w-full bg-white py-5 px-3 rounded-xl" type="text"
                                placeholder="Type your message here..." />
                            <!-- Button to submit the response -->
                            <button type="submit" class=" text-white py-2 px-4 rounded mt-3">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>

<script setup>
import { ref, onMounted, computed } from 'vue';
import { useStore } from 'vuex';
import { usePage } from '@inertiajs/vue3';
import axios from 'axios';
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';

const store = useStore();
const { props } = usePage();
const currentUser = props.auth.user;

const searchQuery = ref('');
const selectedIssueId = ref(null);
const newResponse = ref('');

// Computed properties
const issues = computed(() => store.state.issues.issues);
const selectedIssue = computed(() => store.state.issues.selectedIssue);
const responses = computed(() => store.state.issues.responses);

// Fetch issues on component mount
onMounted(() => {
  store.dispatch('issues/fetchIssues');
});

const filteredIssues = computed(() => {
  return issues.value.filter((issue) =>
    issue.description.toLowerCase().includes(searchQuery.value.toLowerCase())
  );
});

const selectIssue = async (issue) => {
  store.commit('issues/setSelectedIssue', issue);
  selectedIssueId.value = issue.id;
  await store.dispatch('issues/fetchIssueResponses', issue.id);
};

const formatTimestamp = (timestamp) => {
  const date = new Date(timestamp);
  const options = { hour: 'numeric', minute: 'numeric', day: 'numeric', month: 'long', year: 'numeric' };
  return date.toLocaleString(undefined, options);
};

const isSelected = (issue) => {
  return issue.id === selectedIssueId.value;
};

const submitResponse = async () => {
  try {
    await axios.post(`/api/issues/${selectedIssue.value.id}/responses`, {
      response_text: newResponse.value,
      user_id: currentUser.id,
      issue_id: selectedIssue.value.id,
    });
    newResponse.value = '';
    await store.dispatch('issues/fetchIssueResponses', selectedIssue.value.id);
  } catch (error) {
    console.error('Error submitting response:', error);
  }
};
</script>

<style scoped>
.selected-issue {
        background-color: #046a5b;
        border-bottom-width: 2px;
        border-left-width: 2px;
        border-color: #046a5b;
    }
    button {
        background-color: #046a5b;

    }
</style>
