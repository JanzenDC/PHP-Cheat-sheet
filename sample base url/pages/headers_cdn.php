<script>
  const basePath = `${window.origin}/projects/School_system/resources/`;

  function loadScript(src) {
    const script = document.createElement('script');
    script.src = src;
    document.head.appendChild(script);
  }

  function loadStylesheet(href) {
    const link = document.createElement('link');
    link.rel = 'stylesheet';
    link.href = href;
    document.head.appendChild(link);
  }

  loadScript(`${basePath}jquery-3.6.0.min.js`);
  loadStylesheet(`${basePath}Select2/select2.min.css`);
  loadScript(`${basePath}Select2/select2.min.js`);
  loadStylesheet(`${basePath}dataTables/dataTables.dataTables.min.css`);
  loadScript(`${basePath}dataTables/dataTables.min.js`);
  loadScript(`${basePath}moment/moment.js`);
  loadStylesheet(`${basePath}sweetalert/sweetalert2.min.css`);
  loadScript(`${basePath}sweetalert/sweetalert2.min.js`);
  loadStylesheet(`${basePath}toastr/toastr.min.css`);
  loadScript(`${basePath}toastr/toastr.min.js`);
  loadScript(`${basePath}ChartJs/chart.umd.min.js`);
</script>
