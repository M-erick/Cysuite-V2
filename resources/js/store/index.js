import { createStore } from 'vuex';
import issues from './modules/issues';
import rooms from './modules/rooms';
import adminPanel from './modules/adminPanel';

const store = createStore({
    // i should register issue
  modules: {
    issues,
    rooms,
    adminPanel,
  },
});

export default store;
