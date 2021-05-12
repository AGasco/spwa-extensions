import { BREATHINGMODE_ENABLE } from './BreathingMode.action';

/** @namespace ScandiBreathingPattern/Store/BreathingMode/Reducer/getInitialState */
export const getInitialState = () => ({
    enabled: false
});

/** @namespace ScandiBreathingPattern/Store/BreathingMode/Reducer/BreathingModeReducer */
export const BreathingModeReducer = (state = getInitialState(), action) => {
    switch (action.type) {
    case BREATHINGMODE_ENABLE:
        const { enabled } = action;

        return {
            ...state,
            enabled
        };
    default:
        return state;
    }
};

export default BreathingModeReducer;
