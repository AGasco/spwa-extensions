import { connect } from "react-redux";

import DarkModeProvider from "./DarkModeProvider.component";

/** @namespace ScandiDarkTheme/Component/DarkModeProvider/Container/mapStateToProps */
export const mapStateToProps = (_state) => ({
    isDarkModeEnabled: _state.DarkModeReducer.enabled
});

export const mapDispatchToProps = (_dispatch) => ({})


export default connect(mapStateToProps, mapDispatchToProps)(DarkModeProvider)