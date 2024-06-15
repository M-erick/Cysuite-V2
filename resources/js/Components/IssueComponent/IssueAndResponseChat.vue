<template>

    <div>
        <div v-if="loading">
            <div v-for="response in responses" :key="response.id" :class="{
                'justify-end':
                    response.user_id === currentUser.id,
                'justify-start':
                    response.user_id !== currentUser.id,
            }" class="flex mb-4">
                <span>@UserID::<span class="font-semibold">{{
                    response.user_id
                        }}</span></span>
                <div
                    class="relative mb-4 mr-2 py-3 px-4 bg-green-900 rounded-bl-3xl rounded-tl-3xl rounded-tr-xl text-white">
                    {{ response.response_text }}
                    <span class="absolute bottom-0 italic left-0 text-xs text-gray-400 transform translate-y-full">{{
                        formatTimestamp(response.created_at)
                    }}</span>
                </div>
                <i :class="['fa-solid fa-check text-white py-2 px-4 rounded-bl-3xl rounded-tl-3xl rounded-tr-xl m-3', { 'bg-green-900': !isIssueClosed, 'bg-gray-500': isIssueClosed }]"
                    @click="markAsResolved(response.id)">
                </i>
                <RateAdminResponse :isIssueClosed="isIssueClosed" :responseId="response.id" />

            </div>

        </div>
        <div v-else>
            <IssueAndResponseChatAnimationSkeleton />


        </div>
    </div>
</template>

<script setup>
import { usePage } from "@inertiajs/vue3";
import { ref, computed } from "vue";
import { useStore } from "vuex";
import RateAdminResponse from './RateAdminResponse.vue';
import IssueAndResponseChatAnimationSkeleton from './IssueAndResponseChatAnimationSkeleton.vue';

const store = useStore();
const { props } = usePage();
const currentUser = props.auth.user;
const loading = ref(false);
let responses = ref([]);

const selectedIssue = computed(() => store.state.issues.selectedIssue);

setTimeout(() => {
    loading.value = true;
    responses = computed(() => store.state.issues.responses);


}, 2000);
// check if issue has being resolved
const isIssueClosed = computed(() => selectedIssue.value && selectedIssue.value.status === 'closed');

const formatTimestamp = (timestamp) => {
    const date = new Date(timestamp);
    const options = {
        hour: "numeric",
        minute: "numeric",
        day: "numeric",
        month: "short",
        year: "numeric",
    };
    return date.toLocaleString(undefined, options);
};

//  mark issue as resolve
const markAsResolved = async (responseId) => {
    try {
        await axios.put(`/api/issues/${selectedIssue.value.id}`, {
            user_id: currentUser.id,
            title: selectedIssue.value.title,
            description: selectedIssue.value.description,
            status: 'closed',
        });
        await store.dispatch('issues/fetchIssues');
        await store.dispatch('issues/fetchIssueResponses', selectedIssue.value.id);
    } catch (error) {
        console.error('Error marking issue as resolved:', error);
    }
};

</script>

<style></style>
