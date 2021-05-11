import { connect } from 'react-redux';

import ColorInverter from './ColorInverter.component';

/** @namespace ScandiDarkTheme/Component/ColorInverter/Container/mapStateToProps */
export const mapStateToProps = (_state) => ({
    isDarkModeEnabled: _state.DarkModeReducer.enabled
});

/** @namespace ScandiDarkTheme/Component/ColorInverter/Container/mapDispatchToProps */
export const mapDispatchToProps = (_dispatch) => ({});

export default connect(mapStateToProps, mapDispatchToProps)(ColorInverter);
