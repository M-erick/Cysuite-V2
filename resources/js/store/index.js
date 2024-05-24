import { createStore } from 'vuex';
import issues from './modules/issues';
const store = createStore({
    // i should register issue
  modules: {
    issues,
  },
});

export default store;
