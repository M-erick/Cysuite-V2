import { createStore } from 'vuex';
import issues from './modules/issues';
import rooms from './modules/rooms';
const store = createStore({
    // i should register issue
  modules: {
    issues,
    rooms,
  },
});

export default store;
