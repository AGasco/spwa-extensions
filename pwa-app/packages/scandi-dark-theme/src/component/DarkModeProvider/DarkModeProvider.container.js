import { connect } from "react-redux";

import DarkModeProvider from "./DarkModeProvider.component";

/** @namespace ScandiDarkTheme/Component/DarkModeProvider/Container/mapStateToProps */
export const mapStateToProps = (_state) => ({
    isEnabled: _state.DarkModeReducer.enabled
});


export default connect(mapStateToProps)(DarkModeProvider)