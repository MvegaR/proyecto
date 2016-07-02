package gui;

import javax.swing.JPanel;
import java.awt.BorderLayout;
import javax.swing.JScrollPane;
import java.awt.Color;
import java.awt.Desktop;
import java.awt.Dimension;

import javax.swing.JLabel;
import java.awt.Font;
import java.io.IOException;
import java.net.URI;
import java.net.URISyntaxException;

import javax.swing.ScrollPaneConstants;
import javax.swing.border.LineBorder;
import javax.swing.JButton;
import java.awt.SystemColor;

public class MenuAdmin extends JPanel {

    private static final long serialVersionUID = 1L;

    JPanel panelParaScroll;
    JPanel panelPrincipalVisible;
    JPanel contenedorModulos;
    JPanel moduloPlanificacion;
    JPanel panel_3;
    JPanel panel_5;
    JPanel panel_6;
    JPanel panel_7;

    JScrollPane scrollpanel;

    JButton btnDepartamentos;
    JButton btnFacultades;
    JButton btnEdificios;
    JButton btnSalas;
    JButton btnAsignaciones;
    JButton btnDocentes;
    JButton btnCarreras;
    JButton btnAsignaturas;
    JButton btnSecciones;
    JButton btnSolicitudesDeAsignacin;
    JButton btnSolicitudesDeAsignacin_1;
    JButton btnSolicitudesDeCambio;
    JButton btnSolicitudesDeCancelacin;
    JButton btnReportesDeSala;
    JButton btnEstadosAsignaciones;
    JButton btnEstadosAsignacionesTemporales;
    JButton btnEstadosCambios;
    JButton btnEstadoCancelacin;
    JButton btnTiposDeDenuncia;
    JButton btnTiposDeSala;
    JButton btnDasHbiles;
    JButton btnIniciosDeHora;
    JButton btnRoles;
    JButton btnExportarBaseDe;
    JButton btnImportarBaseDe;
    JScrollPane scrollPane;
    JLabel lblMduloDePlanificacin;
    JLabel lblMduloDeRecursos;
    JLabel lblMduloDeTipos;
    JLabel lblMduloDeRespaldos;
    JLabel label;
    Font fuenteBotones = new Font("Times New Roman", Font.PLAIN, 30);

    /**
     * Create the panel.
     * 
     * PANEL DE MARCOS
     */
    public MenuAdmin() {
	this.setBounds(0, 0, 1230, 600);
	setLayout(null);
	panelParaScroll = new JPanel();
	panelParaScroll.setBounds(0, 0, 1275, 615);
	add(panelParaScroll);
	panelParaScroll.setLayout(new BorderLayout(0, 0));

	scrollpanel = new JScrollPane();
	scrollpanel.setAutoscrolls(true);
	scrollpanel.setHorizontalScrollBarPolicy(ScrollPaneConstants.HORIZONTAL_SCROLLBAR_AS_NEEDED);
	scrollpanel.setVerticalScrollBarPolicy(ScrollPaneConstants.VERTICAL_SCROLLBAR_ALWAYS);
	panelParaScroll.add(scrollpanel);
	scrollpanel.setDoubleBuffered(false); 

	panelPrincipalVisible = new JPanel();
	panelPrincipalVisible.setBackground(SystemColor.inactiveCaption);
	panelPrincipalVisible.setPreferredSize(new Dimension(1230, 1280));
	panelPrincipalVisible.setAutoscrolls(true);
	scrollpanel.setViewportView(panelPrincipalVisible);
	panelPrincipalVisible.setLayout(null);

	contenedorModulos = new JPanel();
	//contenedorModulos.setBorder(new LineBorder(new Color(0, 100, 172)));
	contenedorModulos.setBackground(SystemColor.inactiveCaption);
	contenedorModulos.setBounds(155, 44, 937, 1175);
	panelPrincipalVisible.add(contenedorModulos);
	contenedorModulos.setLayout(null);

	moduloPlanificacion = new JPanel();
	moduloPlanificacion.setBorder(new LineBorder(new Color(0, 0, 0)));
	moduloPlanificacion.setBackground(new Color(0, 100, 172));
	moduloPlanificacion.setBounds(40, 63, 860, 181);
	contenedorModulos.add(moduloPlanificacion);
	moduloPlanificacion.setLayout(null);

	btnDepartamentos = new JButton("Departamentos");
	btnDepartamentos.setBounds(450, 20, 400, 41);
	btnDepartamentos.setFont(new Font("Times New Roman", Font.PLAIN, 25));
	moduloPlanificacion.add(btnDepartamentos);


	btnFacultades = new JButton("Facultades");
	btnFacultades.setFont(new Font("Times New Roman", Font.PLAIN, 25));
	btnFacultades.setBounds(10, 20, 400, 41);
	moduloPlanificacion.add(btnFacultades);

	btnEdificios = new JButton("Edificios");
	btnEdificios.setFont(new Font("Times New Roman", Font.PLAIN, 25));
	btnEdificios.setBounds(10, 73, 400, 41);
	moduloPlanificacion.add(btnEdificios);

	btnSalas = new JButton("Salas");
	btnSalas.setFont(new Font("Times New Roman", Font.PLAIN, 25));
	btnSalas.setBounds(450, 73, 400, 41);
	moduloPlanificacion.add(btnSalas);

	btnAsignaciones = new JButton("Asignaciones");
	btnAsignaciones.setFont(new Font("Times New Roman", Font.PLAIN, 25));
	btnAsignaciones.setBounds(10, 125, 400, 41);
	moduloPlanificacion.add(btnAsignaciones);

	lblMduloDePlanificacin = new JLabel("M\u00F3dulo de planificaci\u00F3n");
	lblMduloDePlanificacin.setFont(new Font("Tahoma", Font.BOLD, 25));
	lblMduloDePlanificacin.setBounds(40, 21, 476, 30);
	contenedorModulos.add(lblMduloDePlanificacin);

	panel_3 = new JPanel();
	panel_3.setLayout(null);
	panel_3.setBorder(new LineBorder(new Color(0, 0, 0)));
	panel_3.setBackground(new Color(0, 100, 172));
	panel_3.setBounds(40, 298, 860, 134);
	contenedorModulos.add(panel_3);

	btnDocentes = new JButton("Docentes");
	btnDocentes.setFont(new Font("Times New Roman", Font.PLAIN, 25));
	btnDocentes.setBounds(10, 21, 400, 41);
	panel_3.add(btnDocentes);

	btnCarreras = new JButton("Carreras");
	btnCarreras.setFont(new Font("Times New Roman", Font.PLAIN, 25));
	btnCarreras.setBounds(450, 21, 400, 41);
	panel_3.add(btnCarreras);

	btnAsignaturas = new JButton("Asignaturas");
	btnAsignaturas.setFont(new Font("Times New Roman", Font.PLAIN, 25));
	btnAsignaturas.setBounds(10, 73, 400, 41);
	panel_3.add(btnAsignaturas);

	btnSecciones = new JButton("Secciones");
	btnSecciones.setFont(new Font("Times New Roman", Font.PLAIN, 25));
	btnSecciones.setBounds(450, 73, 400, 41);
	panel_3.add(btnSecciones);

	lblMduloDeRecursos = new JLabel("M\u00F3dulo de recursos");
	lblMduloDeRecursos.setFont(new Font("Tahoma", Font.BOLD, 25));
	lblMduloDeRecursos.setBounds(40, 256, 476, 30);
	contenedorModulos.add(lblMduloDeRecursos);

	panel_5 = new JPanel();
	panel_5.setLayout(null);
	panel_5.setBorder(new LineBorder(new Color(0, 0, 0)));
	panel_5.setBackground(new Color(0, 100, 172));
	panel_5.setBounds(40, 486, 860, 181);
	contenedorModulos.add(panel_5);

	btnSolicitudesDeAsignacin = new JButton("Solicitudes de asignaci\u00F3n");
	btnSolicitudesDeAsignacin.setFont(new Font("Times New Roman", Font.PLAIN, 25));
	btnSolicitudesDeAsignacin.setBounds(10, 21, 400, 41);
	panel_5.add(btnSolicitudesDeAsignacin);

	btnSolicitudesDeAsignacin_1 = new JButton("Solicitudes de asignaci\u00F3n temporal");
	btnSolicitudesDeAsignacin_1.setFont(new Font("Times New Roman", Font.PLAIN, 25));
	btnSolicitudesDeAsignacin_1.setBounds(450, 21, 400, 41);
	panel_5.add(btnSolicitudesDeAsignacin_1);

	btnSolicitudesDeCambio = new JButton("Solicitudes de cambio");
	btnSolicitudesDeCambio.setFont(new Font("Times New Roman", Font.PLAIN, 25));
	btnSolicitudesDeCambio.setBounds(10, 73, 400, 41);
	panel_5.add(btnSolicitudesDeCambio);

	btnSolicitudesDeCancelacin = new JButton("Solicitudes de cancelaci\u00F3n");
	btnSolicitudesDeCancelacin.setFont(new Font("Times New Roman", Font.PLAIN, 25));
	btnSolicitudesDeCancelacin.setBounds(450, 73, 400, 41);
	panel_5.add(btnSolicitudesDeCancelacin);

	btnReportesDeSala = new JButton("Reportes de sala");
	btnReportesDeSala.setFont(new Font("Times New Roman", Font.PLAIN, 25));
	btnReportesDeSala.setBounds(10, 125, 400, 41);
	panel_5.add(btnReportesDeSala);

	JLabel lblMduloDeSolicitudes = new JLabel("M\u00F3dulo de solicitudes de sala");
	lblMduloDeSolicitudes.setFont(new Font("Tahoma", Font.BOLD, 25));
	lblMduloDeSolicitudes.setBounds(40, 444, 476, 30);
	contenedorModulos.add(lblMduloDeSolicitudes);

	panel_6 = new JPanel();
	panel_6.setLayout(null);
	panel_6.setBorder(new LineBorder(new Color(0, 0, 0)));
	panel_6.setBackground(new Color(0, 100, 172));
	panel_6.setBounds(40, 713, 860, 286);
	contenedorModulos.add(panel_6);

	btnEstadosAsignaciones = new JButton("Estados asignaciones");
	btnEstadosAsignaciones.setFont(new Font("Times New Roman", Font.PLAIN, 25));
	btnEstadosAsignaciones.setBounds(10, 13, 400, 41);
	panel_6.add(btnEstadosAsignaciones);

	btnEstadosAsignacionesTemporales = new JButton("Estados asignaciones temporales");
	btnEstadosAsignacionesTemporales.setFont(new Font("Times New Roman", Font.PLAIN, 25));
	btnEstadosAsignacionesTemporales.setBounds(450, 21, 400, 41);
	panel_6.add(btnEstadosAsignacionesTemporales);

	btnEstadosCambios = new JButton("Estados cambios");
	btnEstadosCambios.setFont(new Font("Times New Roman", Font.PLAIN, 25));
	btnEstadosCambios.setBounds(10, 67, 400, 41);
	panel_6.add(btnEstadosCambios);

	btnEstadoCancelacin = new JButton("Estado cancelaci\u00F3n");
	btnEstadoCancelacin.setFont(new Font("Times New Roman", Font.PLAIN, 25));
	btnEstadoCancelacin.setBounds(450, 73, 400, 41);
	panel_6.add(btnEstadoCancelacin);

	btnTiposDeDenuncia = new JButton("Tipos de denuncia");
	btnTiposDeDenuncia.setFont(new Font("Times New Roman", Font.PLAIN, 25));
	btnTiposDeDenuncia.setBounds(10, 121, 400, 41);
	panel_6.add(btnTiposDeDenuncia);

	btnTiposDeSala = new JButton("Tipos de sala");
	btnTiposDeSala.setFont(new Font("Times New Roman", Font.PLAIN, 25));
	btnTiposDeSala.setBounds(450, 125, 400, 41);
	panel_6.add(btnTiposDeSala);

	btnDasHbiles = new JButton("D\u00EDas h\u00E1biles");
	btnDasHbiles.setFont(new Font("Times New Roman", Font.PLAIN, 25));
	btnDasHbiles.setBounds(10, 175, 400, 41);
	panel_6.add(btnDasHbiles);

	btnIniciosDeHora = new JButton("Inicios de hora de clase");
	btnIniciosDeHora.setFont(new Font("Times New Roman", Font.PLAIN, 25));
	btnIniciosDeHora.setBounds(450, 177, 400, 41);
	panel_6.add(btnIniciosDeHora);

	btnRoles = new JButton("Roles");
	btnRoles.setFont(new Font("Times New Roman", Font.PLAIN, 25));
	btnRoles.setBounds(10, 229, 400, 41);
	panel_6.add(btnRoles);

	lblMduloDeTipos = new JLabel("M\u00F3dulo de estados y tipos");
	lblMduloDeTipos.setFont(new Font("Tahoma", Font.BOLD, 25));
	lblMduloDeTipos.setBounds(40, 679, 476, 30);
	contenedorModulos.add(lblMduloDeTipos);

	lblMduloDeRespaldos = new JLabel("M\u00F3dulo de respaldos");
	lblMduloDeRespaldos.setFont(new Font("Tahoma", Font.BOLD, 25));
	lblMduloDeRespaldos.setBounds(40, 1011, 476, 30);
	contenedorModulos.add(lblMduloDeRespaldos);

	panel_7 = new JPanel();
	panel_7.setLayout(null);
	panel_7.setBorder(new LineBorder(new Color(0, 0, 0)));
	panel_7.setBackground(new Color(0, 100, 172));
	panel_7.setBounds(40, 1045, 860, 84);
	contenedorModulos.add(panel_7);

	btnExportarBaseDe = new JButton("Exportar base de datos");
	btnExportarBaseDe.setFont(new Font("Times New Roman", Font.PLAIN, 25));
	btnExportarBaseDe.setBounds(10, 21, 400, 41);
	panel_7.add(btnExportarBaseDe);

	btnImportarBaseDe = new JButton("Importar base de datos");
	btnImportarBaseDe.setFont(new Font("Times New Roman", Font.PLAIN, 25));
	btnImportarBaseDe.setBounds(450, 21, 400, 41);
	panel_7.add(btnImportarBaseDe);


	label = new JLabel("M\u00F3dulo administraci\u00F3n");
	label.setFont(new Font("Times New Roman", Font.BOLD, 30));
	label.setBounds(470, 11, 306, 30);
	panelPrincipalVisible.add(label);
	
	JButton btnVolver = VentanaPrincipal.getBtnVolver();
	btnVolver.setFont(new Font("Times New Roman", Font.PLAIN, 25));
	btnVolver.setBounds(193, 7, 143, 30);
	panelPrincipalVisible.add(btnVolver);

	scrollPane = new JScrollPane();
	scrollPane.setVerticalScrollBarPolicy(ScrollPaneConstants.VERTICAL_SCROLLBAR_ALWAYS);
	scrollPane.setHorizontalScrollBarPolicy(ScrollPaneConstants.HORIZONTAL_SCROLLBAR_ALWAYS);
	btnDepartamentos.addActionListener(e -> abrirEnNavegador("departamento/index"));
	btnFacultades.addActionListener(e -> abrirEnNavegador("facultad/index"));
	btnEdificios.addActionListener(e -> abrirEnNavegador("edificio/index"));
	btnSalas.addActionListener(e -> abrirEnNavegador("sala/index"));
	btnAsignaciones.addActionListener(e -> abrirEnNavegador("bloque/index"));
	btnDocentes.addActionListener(e -> abrirEnNavegador("docente/index"));
	btnCarreras.addActionListener(e -> abrirEnNavegador("carrera/index"));
	btnAsignaturas.addActionListener(e -> abrirEnNavegador("asignatura/index"));
	btnSecciones.addActionListener(e -> abrirEnNavegador("seccion/index"));
	btnSolicitudesDeAsignacin.addActionListener(e -> abrirEnNavegador("solicitud-asignacion/index"));
	btnSolicitudesDeAsignacin_1.addActionListener(e -> abrirEnNavegador("solicitud-asignacion-temporal/index"));
	btnSolicitudesDeCambio.addActionListener(e -> abrirEnNavegador("solicitud-cambio/index"));
	btnSolicitudesDeCancelacin.addActionListener(e -> abrirEnNavegador("solicitud-cancelacion/index"));
	btnReportesDeSala.addActionListener(e -> abrirEnNavegador("post-de-denuncia/index"));
	btnEstadosAsignaciones.addActionListener(e -> abrirEnNavegador("estado-solicitud-asignacion/index"));
	btnEstadosAsignacionesTemporales.addActionListener(e -> abrirEnNavegador("estado-asignacion-temporal/index"));
	btnEstadosCambios.addActionListener(e -> abrirEnNavegador("estado-solicitud-cambio/index"));
	btnEstadoCancelacin.addActionListener(e -> abrirEnNavegador("estado-solicitud-cancelacion/index"));
	btnTiposDeDenuncia.addActionListener(e -> abrirEnNavegador("tipo-denuncia/index"));
	btnTiposDeSala.addActionListener(e -> abrirEnNavegador("tipo-sala/index"));
	btnDasHbiles.addActionListener(e -> abrirEnNavegador("dia/index"));
	btnIniciosDeHora.addActionListener(e -> abrirEnNavegador("tiempo-inicio/index"));
	btnRoles.addActionListener(e -> abrirEnNavegador("rol/index"));
	btnExportarBaseDe.addActionListener(e -> abrirEnNavegador("site/respaldo"));
	btnImportarBaseDe.addActionListener(e -> abrirEnNavegador(""));
    }

    private void abrirEnNavegador(String url){
	try {
	    Desktop.getDesktop().browse(new URI("http://localhost/proyectoDSI/proyecto/frontend/web/index.php?r="+url));
	}catch (URISyntaxException ex) {
	    System.out.println(ex);
	}catch(IOException e){
	    System.out.println(e);
	}
    }
}
