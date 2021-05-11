// TODO update this import when renamed
import { ACTION_TYPE } from './DarkMode.action';

/** @namespace ScandiDarkTheme/Store/DarkMode/Reducer/getInitialState */
export const getInitialState = () => ({
    // TODO set initial state
});

/** @namespace ScandiDarkTheme/Store/DarkMode/Reducer/DarkModeReducer */
export const DarkModeReducer = (state = getInitialState(), action) => {
    switch (action.type) {
    case ACTION_TYPE:
        // const { payload } = action;

        return {
            ...state
            // TODO implement payload handling
        };

    default:
        return state;
    }
};

export default DarkModeReducer;
