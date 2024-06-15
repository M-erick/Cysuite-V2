<template>

    <div class="py-5" v-if="showNewIssue">
        <form @submit.prevent="submitIssue">
            <input v-model="newIssueTitle" class=" bg-white py-5 px-3 rounded-xl" type="text" placeholder="Title" />
            <input v-model="newIssueDescription" class="w-full bg-white py-5 px-3 rounded-xl mt-2" type="text"
                placeholder="Description" />
            <!-- Button to submit the issue -->
            <SubmitButton/>
        </form>
    </div>
</template>

<script setup>
import axios from "axios";
import { useStore } from "vuex";
import { usePage } from "@inertiajs/vue3";
import { ref } from "vue";
import SubmitButton from "./SubmitButton.vue";

const store = useStore();
const { props } = usePage();
const currentUser = props.auth.user;
const newIssueTitle = ref('');
const newIssueDescription = ref('');

const { showNewIssue, } = defineProps({
    showNewIssue: {
        required: true,
    },
});


const submitIssue = async () => {
    try {
        await axios.post(`/api/issues`, {
            user_id: currentUser.id,
            title: newIssueTitle.value,
            description: newIssueDescription.value,
            status: 'open', //  new issues will be  set  open by default
        });
        newIssueTitle.value = ' ';
        newIssueDescription.value = ' ';

        await store.dispatch('issues/fetchIssues');
    } catch (error) {
        console.error('Error submitting issue:', error);
    }
};
</script>

