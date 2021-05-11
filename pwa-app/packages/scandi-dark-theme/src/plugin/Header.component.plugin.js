export const testPlugin = (args, callback, instance) => {
    console.log("Yoohooo");
    return callback(...args);
}

export default {
    "Component/Header/Component": {
        "member-function": {
            render: testPlugin
        }
    }
}