 const _initPref = function () {
    if (!/.elenet.me/.test(window.location.href)) return
    window.ElemePerfConfigs = {
      appVer: '0.0.1', // 当前版本号，用来标志webapp的版本
      trackerDomain: 'http://perf.alpha.elenet.me', // 对接alpha环境
      sendingTypes: {
        load: true, // 默认为true，false则不进行报告
        error: true,
        event: true,
        asset: true
      }
    };
  }
  _initPref();
