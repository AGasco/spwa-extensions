import DarkModeProvider from "../component/DarkModeProvider/DarkModeProvider.container"

export const renderRouter = (args, callback, instance) => {
    console.log("rendering darkmodeprovider");
    return (
        <DarkModeProvider key="router" >
            { callback(...args) }
        </DarkModeProvider>
    )
}

export default {
    "Component/App/Component": {
        "member-function": {
            renderRouter
        }
    }
}