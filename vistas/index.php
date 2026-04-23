<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Progetto</title>
  <link href="https://fonts.googleapis.com/css2?family=Geist:wght@300;400;500;600&display=swap" rel="stylesheet"/>
  <style>
    *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }

    :root {
      --sidebar-w : 220px;
      --header-h  : 56px;
      --blue      : #2563eb;
      --blue-lt   : #eff6ff;
      --blue-md   : #dbeafe;
      --gray-50   : #f9fafb;
      --gray-100  : #f3f4f6;
      --gray-200  : #e5ebe8;
      --gray-400  : #9ca3af;
      --gray-600  : #4b5563;
      --gray-900  : #111827;
      --red       : #dc2626;
      --red-lt    : #fef2f2;
      --font      : 'Geist', sans-serif;
      --radius    : 8px;
      --shadow    : 0 1px 3px rgba(0,0,0,.08), 0 1px 2px rgba(0,0,0,.04);
      --shadow-lg : 0 10px 25px rgba(0,0,0,.10), 0 4px 10px rgba(0,0,0,.06);
    }

    body {
      font-family: var(--font);
      background: var(--gray-50);
      color: var(--gray-900);
      display: flex;
      min-height: 100vh;
      font-size: 14px;
    }

    /* SIDEBAR */
    .sidebar {
      width: var(--sidebar-w);
      background: #fff;
      border-right: 1px solid var(--gray-200);
      display: flex;
      flex-direction: column;
      position: fixed;
      top: 0; left: 0;
      height: 100vh;
      z-index: 100;
    }

    .sidebar-brand {
      padding: 20px 20px 16px;
      border-bottom: 1px solid var(--gray-200);
    }
    .sidebar-brand h1 {
      font-size: 16px;
      font-weight: 600;
      color: var(--gray-900);
      letter-spacing: -.3px;
    }
    .sidebar-brand span {
      font-size: 11px;
      color: var(--gray-400);
      font-weight: 400;
    }

    .sidebar-label {
      padding: 20px 20px 8px;
      font-size: 10px;
      font-weight: 600;
      color: var(--gray-400);
      text-transform: uppercase;
      letter-spacing: .8px;
    }

    .nav-item {
      display: flex;
      align-items: center;
      gap: 10px;
      padding: 9px 20px;
      font-size: 13.5px;
      font-weight: 400;
      color: var(--gray-600);
      cursor: pointer;
      border-radius: 0;
      transition: background .15s, color .15s;
      border: none;
      background: none;
      width: 100%;
      text-align: left;
    }
    .nav-item:hover  { background: var(--gray-50); color: var(--gray-900); }
    .nav-item.active {
      background: var(--blue-lt);
      color: var(--blue);
      font-weight: 500;
    }
    .nav-icon {
      width: 18px; height: 18px;
      display: flex; align-items: center; justify-content: center;
      font-size: 14px;
      flex-shrink: 0;
    }

    /* MAIN */
    .main {
      margin-left: var(--sidebar-w);
      flex: 1;
      display: flex;
      flex-direction: column;
    }

    /*  topbar */
    .topbar {
      height: var(--header-h);
      background: #fff;
      border-bottom: 1px solid var(--gray-200);
      display: flex;
      align-items: center;
      justify-content: space-between;
      padding: 0 28px;
      position: sticky;
      top: 0;
      z-index: 50;
    }
    .topbar-title {
      font-size: 15px;
      font-weight: 500;
      color: var(--gray-900);
    }
    .topbar-title span {
      color: var(--gray-400);
      font-weight: 400;
      margin-right: 6px;
    }

    /*  btn agregar  */
    .btn-add {
      display: inline-flex;
      align-items: center;
      gap: 7px;
      background: var(--blue);
      color: #fff;
      border: none;
      border-radius: var(--radius);
      padding: 8px 16px;
      font-family: var(--font);
      font-size: 13px;
      font-weight: 500;
      cursor: pointer;
      transition: background .15s;
    }
    .btn-add:hover { background: #1d4ed8; }
    .btn-add-icon {
      font-size: 17px;
      line-height: 1;
    }

    /* Content  */
    .content { padding: 28px; }

    /* TABLE CARD */
    .table-card {
      background: #fff;
      border: 1px solid var(--gray-200);
      border-radius: 10px;
      overflow: hidden;
      box-shadow: var(--shadow);
    }

    .table-card-header {
      padding: 14px 20px;
      border-bottom: 1px solid var(--gray-200);
      display: flex;
      align-items: center;
      justify-content: space-between;
    }
    .table-card-header h2 {
      font-size: 13px;
      font-weight: 500;
      color: var(--gray-600);
    }
    .record-count {
      font-size: 11px;
      background: var(--gray-100);
      color: var(--gray-600);
      padding: 2px 8px;
      border-radius: 20px;
    }

    table { width: 100%; border-collapse: collapse; }
    thead { background: var(--gray-50); }
    thead th {
      text-align: left;
      padding: 10px 20px;
      font-size: 11px;
      font-weight: 600;
      color: var(--gray-400);
      text-transform: uppercase;
      letter-spacing: .6px;
      border-bottom: 1px solid var(--gray-200);
    }
    tbody tr {
      border-bottom: 1px solid var(--gray-100);
      transition: background .12s;
    }
    tbody tr:last-child { border-bottom: none; }
    tbody tr:hover { background: var(--gray-50); }
    tbody td { padding: 12px 20px; color: var(--gray-900); }
    .td-id { color: var(--gray-400); font-size: 12px; }
    .td-actions { display: flex; gap: 6px; }

    /* Action buttons */
    .btn-sm {
      padding: 4px 10px;
      font-size: 12px;
      font-family: var(--font);
      border-radius: 5px;
      border: 1px solid var(--gray-200);
      background: #fff;
      color: var(--gray-600);
      cursor: pointer;
      transition: all .15s;
    }
    .btn-sm:hover { border-color: var(--gray-400); color: var(--gray-900); }
    .btn-sm-danger { border-color: #fecaca; color: var(--red); background: var(--red-lt); }
    .btn-sm-danger:hover { background: #fee2e2; border-color: #fca5a5; }

    /* Estado pill */
    .estado-pill {
      display: inline-block;
      font-size: 11px;
      padding: 2px 8px;
      border-radius: 20px;
      font-weight: 500;
    }
    .estado-1 { background: #f0fdf4; color: #16a34a; }
    .estado-0 { background: var(--gray-100); color: var(--gray-400); }

    /*loading */
    .empty-row td {
      text-align: center;
      padding: 40px;
      color: var(--gray-400);
      font-size: 13px;
    }

    /* MODAL */
    .overlay {
      display: none;
      position: fixed; inset: 0;
      background: rgba(17,24,39,.35);
      z-index: 200;
      align-items: center;
      justify-content: center;
    }
    .overlay.open { display: flex; }

    .modal {
      background: #fff;
      border-radius: 12px;
      box-shadow: var(--shadow-lg);
      width: 100%;
      max-width: 420px;
      overflow: hidden;
      animation: modal-in .18s ease;
    }
    @keyframes modal-in {
      from { opacity: 0; transform: translateY(-12px) scale(.98); }
      to   { opacity: 1; transform: translateY(0) scale(1); }
    }

    .modal-header {
      padding: 18px 22px;
      border-bottom: 1px solid var(--gray-200);
      display: flex;
      align-items: center;
      justify-content: space-between;
    }
    .modal-header h3 { font-size: 15px; font-weight: 600; }
    .modal-close {
      width: 28px; height: 28px;
      border-radius: 6px;
      border: none;
      background: none;
      cursor: pointer;
      font-size: 18px;
      color: var(--gray-400);
      display: flex; align-items: center; justify-content: center;
      transition: background .15s;
    }
    .modal-close:hover { background: var(--gray-100); color: var(--gray-900); }

    .modal-body { padding: 22px; }

    .field { margin-bottom: 16px; }
    .field label {
      display: block;
      font-size: 12px;
      font-weight: 500;
      color: var(--gray-600);
      margin-bottom: 6px;
    }
    .field input,
    .field select {
      width: 100%;
      border: 1px solid var(--gray-200);
      border-radius: var(--radius);
      padding: 9px 12px;
      font-family: var(--font);
      font-size: 13.5px;
      color: var(--gray-900);
      background: #fff;
      transition: border-color .15s, box-shadow .15s;
    }
    .field input:focus,
    .field select:focus {
      outline: none;
      border-color: var(--blue);
      box-shadow: 0 0 0 3px rgba(37,99,235,.1);
    }
    .field input::placeholder { color: var(--gray-400); }
    .hint { font-size: 11px; color: var(--gray-400); margin-top: 4px; }

    .modal-footer {
      padding: 14px 22px;
      border-top: 1px solid var(--gray-200);
      display: flex;
      gap: 8px;
      justify-content: flex-end;
    }
    .btn-cancel {
      padding: 8px 16px;
      font-family: var(--font);
      font-size: 13px;
      font-weight: 500;
      border: 1px solid var(--gray-200);
      background: #fff;
      border-radius: var(--radius);
      cursor: pointer;
      color: var(--gray-600);
      transition: all .15s;
    }
    .btn-cancel:hover { border-color: var(--gray-400); color: var(--gray-900); }
    .btn-save {
      padding: 8px 20px;
      font-family: var(--font);
      font-size: 13px;
      font-weight: 500;
      background: var(--blue);
      color: #fff;
      border: none;
      border-radius: var(--radius);
      cursor: pointer;
      transition: background .15s;
    }
    .btn-save:hover { background: #1d4ed8; }

    /* ══ TOAST ═══════════════════════════════════════════════════ */
    #toast {
      position: fixed;
      bottom: 24px; right: 24px;
      background: #fff;
      border: 1px solid var(--gray-200);
      border-radius: var(--radius);
      padding: 11px 16px;
      font-size: 13px;
      box-shadow: var(--shadow-lg);
      display: flex; align-items: center; gap: 8px;
      opacity: 0; transform: translateY(8px);
      transition: all .25s;
      pointer-events: none;
      z-index: 999;
      max-width: 300px;
    }
    #toast.show { opacity: 1; transform: translateY(0); }
    #toast.ok  { border-left: 3px solid #16a34a; }
    #toast.err { border-left: 3px solid var(--red); }
    .toast-dot { width: 7px; height: 7px; border-radius: 50%; flex-shrink: 0; }
    .ok  .toast-dot { background: #16a34a; }
    .err .toast-dot { background: var(--red); }
  </style>
</head>
<body>

<!-- MENU LATERAL  -->
<aside class="sidebar">
  <div class="sidebar-brand">
    <h1>TAREA PMI CRUD</h1>
    <span>CREATED BY NAIG</span>
  </div>

  <p class="sidebar-label">Módulos</p>

  <button class="nav-item active" onclick="setView('productos')">
    <span class="nav-icon"></span> Productos
  </button>
  <button class="nav-item" onclick="setView('usuarios')">
    <span class="nav-icon"></span> Usuarios
  </button>
</aside>

<!-- MAIN -->
<div class="main">

  <!-- Topbar -->
  <header class="topbar">
    <span class="topbar-title" id="topbar-title">
      <span>Módulos /</span> Productos
    </span>
    <button class="btn-add" onclick="abrirModalNuevo()">
      <span class="btn-add-icon">+</span> Agregar
    </button>
  </header>

  <div class="content">

    <!-- LISTA DE PRODUCTOS -->
    <div id="view-productos">
      <div class="table-card">
        <div class="table-card-header">
          <h2>Lista de Productos</h2>
          <span class="record-count" id="count-productos">0 registros</span>
        </div>
        <table>
          <thead>
            <tr>
              <th>#</th>
              <th>Nombre</th>
              <th>Precio</th>
              <th>Estado</th>
              <th>Acciones</th>
            </tr>
          </thead>
          <tbody id="tbody-productos">
            <tr class="empty-row"><td colspan="5">Cargando...</td></tr>
          </tbody>
        </table>
      </div>
    </div>

    <!--  LISTA USUARIOS -->
    <div id="view-usuarios" style="display:none">
      <div class="table-card">
        <div class="table-card-header">
          <h2>Lista de Usuarios</h2>
          <span class="record-count" id="count-usuarios">0 registros</span>
        </div>
        <table>
          <thead>
            <tr>
              <th>#</th>
              <th>Nombre</th>
              <th>Clave</th>
              <th>Estado</th>
              <th>Acciones</th>
            </tr>
          </thead>
          <tbody id="tbody-usuarios">
            <tr class="empty-row"><td colspan="5">Cargando...</td></tr>
          </tbody>
        </table>
      </div>
    </div>

  </div>
</div>

<!--  NUEVO PRODUCTOS  -->
<div class="overlay" id="modal-producto">
  <div class="modal">
    <div class="modal-header">
      <h3 id="mp-title">Nuevo Producto</h3>
      <button class="modal-close" onclick="cerrarModal('modal-producto')">×</button>
    </div>
    <div class="modal-body">
      <input type="hidden" id="mp-id"/>
      <div class="field">
        <label>Nombre del producto</label>
        <input type="text" id="mp-nombre" />
      </div>
      <div class="field">
        <label>Precio (S/)</label>
        <input type="number" id="mp-precio" step="0.01" min="0"/>
      </div>
      <div class="field">
        <label>Estado</label>
        <select id="mp-estado">
          <option value="1">Activo</option>
          <option value="0">Inactivo</option>
        </select>
      </div>
    </div>
    <div class="modal-footer">
      <button class="btn-cancel" onclick="cerrarModal('modal-producto')">Cancelar</button>
      <button class="btn-save" onclick="guardarProducto()">Guardar</button>
    </div>
  </div>
</div>

<!--  NUEVO USUARIOS -->
<div class="overlay" id="modal-usuario">
  <div class="modal">
    <div class="modal-header">
      <h3 id="mu-title">Nuevo Usuario</h3>
      <button class="modal-close" onclick="cerrarModal('modal-usuario')">×</button>
    </div>
    <div class="modal-body">
      <input type="hidden" id="mu-id"/>
      <div class="field">
        <label>Nombre de usuario</label>
        <input type="text" id="mu-nombre" />
      </div>
      <div class="field">
        <label>Clave</label>
        <input type="password" id="mu-clave" />
        <p class="hint" id="mu-hint"></p>
      </div>
      <div class="field">
        <label>Estado</label>
        <select id="mu-estado">
          <option value="1">Activo</option>
          <option value="0">Inactivo</option>
        </select>
      </div>
    </div>
    <div class="modal-footer">
      <button class="btn-cancel" onclick="cerrarModal('modal-usuario')">Cancelar</button>
      <button class="btn-save" onclick="guardarUsuario()">Guardar</button>
    </div>
  </div>
</div>

<div id="toast"><span class="toast-dot"></span><span id="toast-msg"></span></div>

<script>
  // rutas 
  const CTRL_P = '../controladores/ProductoController.php';
  const CTRL_U = '../controladores/UsuarioController.php';

  
  let vistaActual = 'productos';

  function setView(vista) {
    vistaActual = vista;
    document.querySelectorAll('.nav-item').forEach(n => n.classList.remove('active'));
    event.currentTarget.classList.add('active');

    document.getElementById('view-productos').style.display = vista === 'productos' ? '' : 'none';
    document.getElementById('view-usuarios').style.display  = vista === 'usuarios'  ? '' : 'none';

    const titles = { productos: 'Productos', usuarios: 'Usuarios' };
    document.getElementById('topbar-title').innerHTML =
      `<span>Módulos /</span> ${titles[vista]}`;

    if (vista === 'productos') listarProductos();
    if (vista === 'usuarios')  listarUsuarios();
  }

  //  listar prodcutos 

  async function listarProductos() {
    const tbody = document.getElementById('tbody-productos');
    try {
      const res  = await fetch(`${CTRL_P}?op=listar`);
      const data = await res.json();
      document.getElementById('count-productos').textContent = `${data.length} registros`;

      if (!data.length) {
        tbody.innerHTML = '<tr class="empty-row"><td colspan="5">Sin registros</td></tr>';
        return;
      }
      tbody.innerHTML = data.map(p => `
        <tr>
          <td class="td-id">${p.id}</td>
          <td>${esc(p.nombre)}</td>
          <td>S/ ${parseFloat(p.precio).toFixed(2)}</td>
          <td><span class="estado-pill estado-${p.estado}">${p.estado == 1 ? 'Activo' : 'Inactivo'}</span></td>
          <td class="td-actions">
            <button class="btn-sm" onclick="editarProducto(${p.id})">Editar</button>
            <button class="btn-sm btn-sm-danger" onclick="eliminarProducto(${p.id})">Eliminar</button>
          </td>
        </tr>`).join('');
    } catch {
      tbody.innerHTML = '<tr class="empty-row"><td colspan="5" style="color:#dc2626">Error de conexión</td></tr>';
    }
  }

  function abrirModalNuevo() {
    if (vistaActual === 'productos') {
      document.getElementById('mp-id').value    = '';
      document.getElementById('mp-nombre').value = '';
      document.getElementById('mp-precio').value = '';
      document.getElementById('mp-estado').value = '1';
      document.getElementById('mp-title').textContent = 'Nuevo Producto';
      abrirModal('modal-producto');
    } else {
      document.getElementById('mu-id').value     = '';
      document.getElementById('mu-nombre').value = '';
      document.getElementById('mu-clave').value  = '';
      document.getElementById('mu-estado').value = '1';
      document.getElementById('mu-title').textContent = 'Nuevo Usuario';
      document.getElementById('mu-hint').textContent  = '';
      abrirModal('modal-usuario');
    }
  }

  async function editarProducto(id) {
    const res = await fetch(`${CTRL_P}?op=obtener&id=${id}`);
    const p   = await res.json();
    if (p.error) { toast(p.error, false); return; }
    document.getElementById('mp-id').value     = p.id;
    document.getElementById('mp-nombre').value = p.nombre;
    document.getElementById('mp-precio').value = p.precio;
    document.getElementById('mp-estado').value = p.estado;
    document.getElementById('mp-title').textContent = 'Editar Producto';
    abrirModal('modal-producto');
  }

  async function guardarProducto() {
    const id     = document.getElementById('mp-id').value;
    const nombre = document.getElementById('mp-nombre').value.trim();
    const precio = document.getElementById('mp-precio').value;
    const estado = document.getElementById('mp-estado').value;

    if (!nombre || !precio || parseFloat(precio) <= 0) {
      toast('Completa todos los campos', false); return;
    }

    const fd = new FormData();
    fd.append('nombre', nombre);
    fd.append('precio', precio);
    fd.append('estado', estado);

    const op = id ? 'actualizar' : 'guardar';
    if (id) fd.append('id', id);

    const res  = await fetch(`${CTRL_P}?op=${op}`, { method: 'POST', body: fd });
    const data = await res.json();
    toast(data.message, data.status);
    if (data.status) { cerrarModal('modal-producto'); listarProductos(); }
  }
 // eliminar producto
  async function eliminarProducto(id) {
    if (!confirm('¿Eliminar este producto?')) return;
    const fd = new FormData(); fd.append('id', id);
    const res  = await fetch(`${CTRL_P}?op=eliminar`, { method: 'POST', body: fd });
    const data = await res.json();
    toast(data.message, data.status);
    if (data.status) listarProductos();
  }

  // listar usuarios

  async function listarUsuarios() {
    const tbody = document.getElementById('tbody-usuarios');
    try {
      const res  = await fetch(`${CTRL_U}?op=listar`);
      const data = await res.json();
      document.getElementById('count-usuarios').textContent = `${data.length} registros`;

      if (!data.length) {
        tbody.innerHTML = '<tr class="empty-row"><td colspan="5">Sin registros</td></tr>';
        return;
      }
      tbody.innerHTML = data.map(u => `
        <tr>
          <td class="td-id">${u.id}</td>
          <td>${esc(u.nombre)}</td>
          <td style="color:var(--gray-400);font-size:12px;letter-spacing:.5px">••••••••</td>
          <td><span class="estado-pill estado-${u.estado}">${u.estado == 1 ? 'Activo' : 'Inactivo'}</span></td>
          <td class="td-actions">
            <button class="btn-sm" onclick="editarUsuario(${u.id})">Editar</button>
            <button class="btn-sm btn-sm-danger" onclick="eliminarUsuario(${u.id})">Eliminar</button>
          </td>
        </tr>`).join('');
    } catch {
      tbody.innerHTML = '<tr class="empty-row"><td colspan="5" style="color:#dc2626">Error de conexión</td></tr>';
    }
  }
  //editar usuario
  async function editarUsuario(id) {
    const res = await fetch(`${CTRL_U}?op=obtener&id=${id}`);
    const u   = await res.json();
    if (u.error) { toast(u.error, false); return; }
    document.getElementById('mu-id').value     = u.id;
    document.getElementById('mu-nombre').value = u.nombre;
    document.getElementById('mu-clave').value  = '';
    document.getElementById('mu-estado').value = u.estado;
    document.getElementById('mu-title').textContent = 'Editar Usuario';
    document.getElementById('mu-hint').textContent  = 'Deja la clave en blanco para no cambiarla';
    abrirModal('modal-usuario');
  }
  //guardar
  async function guardarUsuario() {
    const id     = document.getElementById('mu-id').value;
    const nombre = document.getElementById('mu-nombre').value.trim();
    const clave  = document.getElementById('mu-clave').value.trim();
    const estado = document.getElementById('mu-estado').value;

    if (!nombre || (!id && !clave)) {
      toast('Completa todos los campos', false); return;
    }

    const fd = new FormData();
    fd.append('nombre', nombre);
    fd.append('clave',  clave);
    fd.append('estado', estado);

    const op = id ? 'actualizar' : 'guardar';
    if (id) fd.append('id', id);

    const res  = await fetch(`${CTRL_U}?op=${op}`, { method: 'POST', body: fd });
    const data = await res.json();
    toast(data.message, data.status);
    if (data.status) { cerrarModal('modal-usuario'); listarUsuarios(); }
  }
  //eliminar 
  async function eliminarUsuario(id) {
    if (!confirm('¿Eliminar este usuario?')) return;
    const fd = new FormData(); fd.append('id', id);
    const res  = await fetch(`${CTRL_U}?op=eliminar`, { method: 'POST', body: fd });
    const data = await res.json();
    toast(data.message, data.status);
    if (data.status) listarUsuarios();
  }


  function abrirModal(id) {
    document.getElementById(id).classList.add('open');
  }
  function cerrarModal(id) {
    document.getElementById(id).classList.remove('open');
  }
  document.querySelectorAll('.overlay').forEach(o => {
    o.addEventListener('click', e => { if (e.target === o) o.classList.remove('open'); });
  });

  function toast(msg, ok) {
    const t = document.getElementById('toast');
    document.getElementById('toast-msg').textContent = msg;
    t.className = 'show ' + (ok ? 'ok' : 'err');
    setTimeout(() => t.className = '', 3000);
  }

  function esc(str) {
    const d = document.createElement('div');
    d.textContent = str;
    return d.innerHTML;
  }

  listarProductos();
</script>
</body>
</html>
