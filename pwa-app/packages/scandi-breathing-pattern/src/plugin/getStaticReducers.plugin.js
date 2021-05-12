import BreathingModeReducer from '../store/BreathingMode/BreathingMode.reducer';

export const getStaticReducers = (args, callback) => ({
    ...callback(args),
    BreathingModeReducer
});

export default {
    'Store/Index/getReducers': {
        function: getStaticReducers
    }
};
