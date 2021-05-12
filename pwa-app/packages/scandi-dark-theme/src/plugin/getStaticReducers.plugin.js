import DarkModeReducer from "../store/DarkMode/DarkMode.reducer";

export const getStaticReducers = (args, callback) => ({
    ...callback(args),
    DarkModeReducer,
})

export default {
    "Store/Index/getReducers": {
        function: getStaticReducers,
    }
}