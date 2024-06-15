<template>
    <div class="py-5" v-if="showResponseForm">

        <form @submit.prevent="submitResponse">
            <input v-model="newResponse" class="w-full bg-white py-5 px-3 rounded-xl" type="text"
                placeholder="Type your message here..." />
            <!-- Button to submit the response -->
            <SubmitButton/>

        </form>
    </div>
</template>

<script setup>
import {ref,computed} from "vue";
import axios from 'axios';
import { useStore } from "vuex";
import { usePage } from "@inertiajs/vue3";
import SubmitButton from './SubmitButton.vue';

const store = useStore();
const newResponse = ref("");
const showResponseForm = ref(true);
const { props } = usePage();
const currentUser = props.auth.user;

const selectedIssue = computed(() => store.state.issues.selectedIssue);

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

