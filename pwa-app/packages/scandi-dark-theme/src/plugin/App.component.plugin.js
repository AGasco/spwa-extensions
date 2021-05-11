import DarkModeProviderComponent from "../component/DarkModeProvider"

export const render = (args, callback, instance) => {
    return (
        <DarkModeProviderComponent >
            { callback(...args) }
        </DarkModeProviderComponent>
    )
}

export default {
    "App/Component": {
        "member-function": {
            render
        }
    }
}