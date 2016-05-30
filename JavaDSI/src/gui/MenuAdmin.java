package gui;

import javax.swing.JPanel;
import java.awt.BorderLayout;
import javax.swing.JScrollPane;
import java.awt.Color;
import java.awt.Dimension;

import javax.swing.JLabel;
import java.awt.Font;
import javax.swing.ScrollPaneConstants;
import javax.swing.border.LineBorder;
import javax.swing.JButton;

public class MenuAdmin extends JPanel {

    /**
     * 
     */
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

    JButton btnBotton;
    JButton button;
    JButton button_1;
    JButton button_2;
    JButton button_3;
    JButton button_9;
    JButton button_10;
    JButton button_11;
    JButton button_12;
    JButton button_19;
    JButton button_20;
    JButton button_21;
    JButton button_22;
    JButton button_23;
    JButton button_4;
    JButton button_5;
    JButton button_6;
    JButton button_7;
    JButton button_8;
    JButton button_13;
    JButton button_14;
    JButton button_15;
    JButton button_16;
    JButton button_17;
    JButton button_18;
    JButton button_24;
    JButton button_25;
    JButton button_26;
    JScrollPane scrollPane;
    JLabel lblMduloDePlanificacin;
    JLabel lblMduloDeRecursos;
    JLabel lblMduloDeTipos;
    JLabel lblMduloDeRespaldos;
    JLabel label;
    /**
     * Create the panel.
     * 
     * PANEL DE MARCOS
     */
    public MenuAdmin() {
	this.setBounds(0, 0, 1230, 600);
    	setLayout(null);
    	panelParaScroll = new JPanel();
    	panelParaScroll.setBounds(0, 0, 1230, 600);
    	add(panelParaScroll);
    	panelParaScroll.setLayout(new BorderLayout(0, 0));
    	
    	scrollpanel = new JScrollPane();
    	scrollpanel.setAutoscrolls(true);
    	scrollpanel.setHorizontalScrollBarPolicy(ScrollPaneConstants.HORIZONTAL_SCROLLBAR_ALWAYS);
    	scrollpanel.setVerticalScrollBarPolicy(ScrollPaneConstants.VERTICAL_SCROLLBAR_ALWAYS);
    	panelParaScroll.add(scrollpanel);
    	
    	panelPrincipalVisible = new JPanel();
    	panelPrincipalVisible.setPreferredSize(new Dimension(1230, 1280));
    	panelPrincipalVisible.setAutoscrolls(true);
    	scrollpanel.setViewportView(panelPrincipalVisible);
    	panelPrincipalVisible.setLayout(null);
    	
    	contenedorModulos = new JPanel();
    	contenedorModulos.setBorder(new LineBorder(new Color(0, 0, 0)));
    	contenedorModulos.setBackground(Color.WHITE);
    	contenedorModulos.setBounds(155, 44, 922, 1217);
    	panelPrincipalVisible.add(contenedorModulos);
    	contenedorModulos.setLayout(null);
    	
    	moduloPlanificacion = new JPanel();
    	moduloPlanificacion.setBorder(new LineBorder(new Color(0, 0, 0)));
    	moduloPlanificacion.setBackground(Color.WHITE);
    	moduloPlanificacion.setBounds(40, 63, 860, 181);
    	contenedorModulos.add(moduloPlanificacion);
    	moduloPlanificacion.setLayout(null);
    	
    	btnBotton = new JButton("Botton");
    	btnBotton.setBounds(10, 21, 400, 41);
    	btnBotton.setFont(new Font("Times New Roman", Font.PLAIN, 27));
    	btnBotton.setContentAreaFilled(false);
    	moduloPlanificacion.add(btnBotton);
    	
    	button = new JButton("Botton");
    	button.setFont(new Font("Times New Roman", Font.PLAIN, 27));
    	button.setContentAreaFilled(false);
    	button.setBounds(450, 21, 400, 41);
    	moduloPlanificacion.add(button);
    	
    	button_1 = new JButton("Botton");
    	button_1.setFont(new Font("Times New Roman", Font.PLAIN, 27));
    	button_1.setContentAreaFilled(false);
    	button_1.setBounds(10, 73, 400, 41);
    	moduloPlanificacion.add(button_1);
    	
    	button_2 = new JButton("Botton");
    	button_2.setFont(new Font("Times New Roman", Font.PLAIN, 27));
    	button_2.setContentAreaFilled(false);
    	button_2.setBounds(450, 73, 400, 41);
    	moduloPlanificacion.add(button_2);
    	
    	button_3 = new JButton("Botton");
    	button_3.setFont(new Font("Times New Roman", Font.PLAIN, 27));
    	button_3.setContentAreaFilled(false);
    	button_3.setBounds(10, 125, 400, 41);
    	moduloPlanificacion.add(button_3);
    	
    	lblMduloDePlanificacin = new JLabel("M\u00F3dulo de planificaci\u00F3n");
    	lblMduloDePlanificacin.setFont(new Font("Tahoma", Font.BOLD, 18));
    	lblMduloDePlanificacin.setBounds(40, 21, 247, 22);
    	contenedorModulos.add(lblMduloDePlanificacin);
    	
    	panel_3 = new JPanel();
    	panel_3.setLayout(null);
    	panel_3.setBorder(new LineBorder(new Color(0, 0, 0)));
    	panel_3.setBackground(Color.WHITE);
    	panel_3.setBounds(40, 298, 860, 134);
    	contenedorModulos.add(panel_3);
    	
    	button_9 = new JButton("Botton");
    	button_9.setFont(new Font("Times New Roman", Font.PLAIN, 27));
    	button_9.setContentAreaFilled(false);
    	button_9.setBounds(10, 21, 400, 41);
    	panel_3.add(button_9);
    	
    	button_10 = new JButton("Botton");
    	button_10.setFont(new Font("Times New Roman", Font.PLAIN, 27));
    	button_10.setContentAreaFilled(false);
    	button_10.setBounds(450, 21, 400, 41);
    	panel_3.add(button_10);
    	
    	button_11 = new JButton("Botton");
    	button_11.setFont(new Font("Times New Roman", Font.PLAIN, 27));
    	button_11.setContentAreaFilled(false);
    	button_11.setBounds(10, 73, 400, 41);
    	panel_3.add(button_11);
    	
    	button_12 = new JButton("Botton");
    	button_12.setFont(new Font("Times New Roman", Font.PLAIN, 27));
    	button_12.setContentAreaFilled(false);
    	button_12.setBounds(450, 73, 400, 41);
    	panel_3.add(button_12);
    	
    	lblMduloDeRecursos = new JLabel("M\u00F3dulo de recursos");
    	lblMduloDeRecursos.setFont(new Font("Tahoma", Font.BOLD, 18));
    	lblMduloDeRecursos.setBounds(40, 256, 247, 22);
    	contenedorModulos.add(lblMduloDeRecursos);
    	
    	panel_5 = new JPanel();
    	panel_5.setLayout(null);
    	panel_5.setBorder(new LineBorder(new Color(0, 0, 0)));
    	panel_5.setBackground(Color.WHITE);
    	panel_5.setBounds(40, 486, 860, 181);
    	contenedorModulos.add(panel_5);
    	
    	button_19 = new JButton("Botton");
    	button_19.setFont(new Font("Times New Roman", Font.PLAIN, 27));
    	button_19.setContentAreaFilled(false);
    	button_19.setBounds(10, 21, 400, 41);
    	panel_5.add(button_19);
    	
    	button_20 = new JButton("Botton");
    	button_20.setFont(new Font("Times New Roman", Font.PLAIN, 27));
    	button_20.setContentAreaFilled(false);
    	button_20.setBounds(450, 21, 400, 41);
    	panel_5.add(button_20);
    	
    	button_21 = new JButton("Botton");
    	button_21.setFont(new Font("Times New Roman", Font.PLAIN, 27));
    	button_21.setContentAreaFilled(false);
    	button_21.setBounds(10, 73, 400, 41);
    	panel_5.add(button_21);
    	
    	button_22 = new JButton("Botton");
    	button_22.setFont(new Font("Times New Roman", Font.PLAIN, 27));
    	button_22.setContentAreaFilled(false);
    	button_22.setBounds(450, 73, 400, 41);
    	panel_5.add(button_22);
    	
    	button_23 = new JButton("Botton");
    	button_23.setFont(new Font("Times New Roman", Font.PLAIN, 27));
    	button_23.setContentAreaFilled(false);
    	button_23.setBounds(10, 125, 400, 41);
    	panel_5.add(button_23);
    	
    	JLabel lblMduloDeSolicitudes = new JLabel("M\u00F3dulo de solicitudes de sala");
    	lblMduloDeSolicitudes.setFont(new Font("Tahoma", Font.BOLD, 18));
    	lblMduloDeSolicitudes.setBounds(40, 444, 267, 22);
    	contenedorModulos.add(lblMduloDeSolicitudes);
    	
    	panel_6 = new JPanel();
    	panel_6.setLayout(null);
    	panel_6.setBorder(new LineBorder(new Color(0, 0, 0)));
    	panel_6.setBackground(Color.WHITE);
    	panel_6.setBounds(40, 713, 860, 286);
    	contenedorModulos.add(panel_6);
    	
    	button_4 = new JButton("Botton");
    	button_4.setFont(new Font("Times New Roman", Font.PLAIN, 27));
    	button_4.setContentAreaFilled(false);
    	button_4.setBounds(10, 21, 400, 41);
    	panel_6.add(button_4);
    	
    	button_5 = new JButton("Botton");
    	button_5.setFont(new Font("Times New Roman", Font.PLAIN, 27));
    	button_5.setContentAreaFilled(false);
    	button_5.setBounds(450, 21, 400, 41);
    	panel_6.add(button_5);
    	
    	button_6 = new JButton("Botton");
    	button_6.setFont(new Font("Times New Roman", Font.PLAIN, 27));
    	button_6.setContentAreaFilled(false);
    	button_6.setBounds(10, 73, 400, 41);
    	panel_6.add(button_6);
    	
    	button_7 = new JButton("Botton");
    	button_7.setFont(new Font("Times New Roman", Font.PLAIN, 27));
    	button_7.setContentAreaFilled(false);
    	button_7.setBounds(450, 73, 400, 41);
    	panel_6.add(button_7);
    	
    	button_8 = new JButton("Botton");
    	button_8.setFont(new Font("Times New Roman", Font.PLAIN, 27));
    	button_8.setContentAreaFilled(false);
    	button_8.setBounds(10, 125, 400, 41);
    	panel_6.add(button_8);
    	
    	button_13 = new JButton("Botton");
    	button_13.setFont(new Font("Times New Roman", Font.PLAIN, 27));
    	button_13.setContentAreaFilled(false);
    	button_13.setBounds(450, 125, 400, 41);
    	panel_6.add(button_13);
    	
    	button_14 = new JButton("Botton");
    	button_14.setFont(new Font("Times New Roman", Font.PLAIN, 27));
    	button_14.setContentAreaFilled(false);
    	button_14.setBounds(10, 177, 400, 41);
    	panel_6.add(button_14);
    	
    	button_15 = new JButton("Botton");
    	button_15.setFont(new Font("Times New Roman", Font.PLAIN, 27));
    	button_15.setContentAreaFilled(false);
    	button_15.setBounds(450, 177, 400, 41);
    	panel_6.add(button_15);
    	
    	button_16 = new JButton("Botton");
    	button_16.setFont(new Font("Times New Roman", Font.PLAIN, 27));
    	button_16.setContentAreaFilled(false);
    	button_16.setBounds(10, 229, 400, 41);
    	panel_6.add(button_16);
    	
    	button_17 = new JButton("Botton");
    	button_17.setFont(new Font("Times New Roman", Font.PLAIN, 27));
    	button_17.setContentAreaFilled(false);
    	button_17.setBounds(450, 229, 400, 41);
    	panel_6.add(button_17);
    	
    	lblMduloDeTipos = new JLabel("M\u00F3dulo de estados y tipos");
    	lblMduloDeTipos.setFont(new Font("Tahoma", Font.BOLD, 18));
    	lblMduloDeTipos.setBounds(40, 679, 247, 22);
    	contenedorModulos.add(lblMduloDeTipos);
    	
    	lblMduloDeRespaldos = new JLabel("M\u00F3dulo de respaldos");
    	lblMduloDeRespaldos.setFont(new Font("Tahoma", Font.BOLD, 18));
    	lblMduloDeRespaldos.setBounds(40, 1011, 247, 22);
    	contenedorModulos.add(lblMduloDeRespaldos);
    	
    	panel_7 = new JPanel();
    	panel_7.setLayout(null);
    	panel_7.setBorder(new LineBorder(new Color(0, 0, 0)));
    	panel_7.setBackground(Color.WHITE);
    	panel_7.setBounds(40, 1045, 860, 134);
    	contenedorModulos.add(panel_7);
    	
    	button_18 = new JButton("Botton");
    	button_18.setFont(new Font("Times New Roman", Font.PLAIN, 27));
    	button_18.setContentAreaFilled(false);
    	button_18.setBounds(10, 21, 400, 41);
    	panel_7.add(button_18);
    	
    	button_24 = new JButton("Botton");
    	button_24.setFont(new Font("Times New Roman", Font.PLAIN, 27));
    	button_24.setContentAreaFilled(false);
    	button_24.setBounds(450, 21, 400, 41);
    	panel_7.add(button_24);
    	
    	button_25 = new JButton("Botton");
    	button_25.setFont(new Font("Times New Roman", Font.PLAIN, 27));
    	button_25.setContentAreaFilled(false);
    	button_25.setBounds(10, 73, 400, 41);
    	panel_7.add(button_25);
    	
    	button_26 = new JButton("Botton");
    	button_26.setFont(new Font("Times New Roman", Font.PLAIN, 27));
    	button_26.setContentAreaFilled(false);
    	button_26.setBounds(450, 73, 400, 41);
    	panel_7.add(button_26);
    	
    	label = new JLabel("M\u00F3dulo administraci\u00F3n");
    	label.setFont(new Font("Tahoma", Font.BOLD, 20));
    	label.setBounds(493, 11, 247, 22);
    	panelPrincipalVisible.add(label);
    	
    	scrollPane = new JScrollPane();
    	scrollPane.setVerticalScrollBarPolicy(ScrollPaneConstants.VERTICAL_SCROLLBAR_ALWAYS);
    	scrollPane.setHorizontalScrollBarPolicy(ScrollPaneConstants.HORIZONTAL_SCROLLBAR_ALWAYS);
    	


    }
}
