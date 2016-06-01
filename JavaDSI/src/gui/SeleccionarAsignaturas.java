package gui;

import java.sql.*;
import java.util.ArrayList;
import java.util.Vector;
import javax.swing.JPanel;
import java.awt.event.ItemEvent;
import java.awt.event.ItemListener;
import javax.swing.JComboBox;
import javax.swing.JLabel;
import javax.swing.BoxLayout;
import java.awt.BorderLayout;
import java.awt.Font;
import javax.swing.SwingConstants;
import javax.swing.JButton;
import java.awt.GridBagLayout;
import java.awt.GridBagConstraints;
import java.awt.Insets;

public class SeleccionarAsignaturas extends JPanel {
	
	private JPanel contenedor,panelBotones,panelSur;
	private JComboBox comboBoxCarrera,comboBoxSemestre,comboBoxFacultad;
	private JLabel tituloComboBoxCarrera,tituloComboBoxSemestre,tituloComboBoxFacultad;
	private PanelAsignaturas panelAsignaturas;
	private int contador = 1, posPBotones = 0;
	private JLabel lblSeleccioneCarreras;
	private JButton btnSeleccionar, btnVolverAtras;
	
	public SeleccionarAsignaturas() {
		contenedor = new JPanel();
		panelSur = new JPanel();
        setLayout(new BorderLayout(0, 0));
		
		btnSeleccionar = new JButton("SELECCIONAR");
		btnVolverAtras = new JButton("VOLVER");
		panelSur.add(btnSeleccionar);
		panelSur.add(btnVolverAtras);
		contenedor.setLayout(new BoxLayout(contenedor, BoxLayout.X_AXIS));
		panelBotones = new JPanel();
		GridBagLayout gbl_panelBotones = new GridBagLayout();
		gbl_panelBotones.columnWidths = new int[]{125, 125, 125, 0};
		gbl_panelBotones.rowHeights = new int[]{20, 20, 0};
		gbl_panelBotones.columnWeights = new double[]{1.0, 1.0, 1.0, Double.MIN_VALUE};
		gbl_panelBotones.rowWeights = new double[]{0.0, 0.0, Double.MIN_VALUE};
		panelBotones.setLayout(gbl_panelBotones);
		tituloComboBoxCarrera = new JLabel("Seleccionar por Carrera:");
		GridBagConstraints gbc_tituloComboBoxCarrera = new GridBagConstraints();
		gbc_tituloComboBoxCarrera.anchor = GridBagConstraints.NORTHEAST;
		gbc_tituloComboBoxCarrera.insets = new Insets(0, 0, 5, 5);
		gbc_tituloComboBoxCarrera.gridx = 0;
		gbc_tituloComboBoxCarrera.gridy = 0;
		panelBotones.add(tituloComboBoxCarrera, gbc_tituloComboBoxCarrera);
		tituloComboBoxSemestre = new JLabel("Seleccionar por Semestre:");
		GridBagConstraints gbc_tituloComboBoxSemestre = new GridBagConstraints();
		gbc_tituloComboBoxSemestre.anchor = GridBagConstraints.NORTHEAST;
		gbc_tituloComboBoxSemestre.insets = new Insets(0, 0, 5, 5);
		gbc_tituloComboBoxSemestre.gridx = 1;
		gbc_tituloComboBoxSemestre.gridy = 0;
		panelBotones.add(tituloComboBoxSemestre, gbc_tituloComboBoxSemestre);
		tituloComboBoxFacultad = new JLabel("Seleccionar por Facultad:");
		GridBagConstraints gbc_tituloComboBoxFacultad = new GridBagConstraints();
		gbc_tituloComboBoxFacultad.anchor = GridBagConstraints.NORTHEAST;
		gbc_tituloComboBoxFacultad.insets = new Insets(0, 0, 5, 0);
		gbc_tituloComboBoxFacultad.gridx = 2;
		gbc_tituloComboBoxFacultad.gridy = 0;
		panelBotones.add(tituloComboBoxFacultad, gbc_tituloComboBoxFacultad);
		comboBoxCarrera = new JComboBox(opcionesComboBox("select ID_CARRERA, NOMBRE_CARRERA from carrera",1));
		Listenner(comboBoxCarrera);
		GridBagConstraints gbc_comboBoxCarrera = new GridBagConstraints();
		gbc_comboBoxCarrera.anchor = GridBagConstraints.NORTHEAST;
		gbc_comboBoxCarrera.insets = new Insets(0, 0, 0, 5);
		gbc_comboBoxCarrera.gridx = 0;
		gbc_comboBoxCarrera.gridy = 1;
		panelBotones.add(comboBoxCarrera, gbc_comboBoxCarrera);
		comboBoxSemestre = new JComboBox(opcionesComboBox("select DISTINCT SEMESTRE from asignatura",2));
		Listenner(comboBoxSemestre);
		GridBagConstraints gbc_comboBoxSemestre = new GridBagConstraints();
		gbc_comboBoxSemestre.anchor = GridBagConstraints.NORTHEAST;
		gbc_comboBoxSemestre.insets = new Insets(0, 0, 0, 5);
		gbc_comboBoxSemestre.gridx = 1;
		gbc_comboBoxSemestre.gridy = 1;
		panelBotones.add(comboBoxSemestre, gbc_comboBoxSemestre);
		contenedor.add(panelBotones);
		comboBoxFacultad = new JComboBox(opcionesComboBox("select ID_FACULTAD, NOMBRE_FACULTAD from facultad",1));
		Listenner(comboBoxFacultad);
		GridBagConstraints gbc_comboBoxFacultad = new GridBagConstraints();
		gbc_comboBoxFacultad.anchor = GridBagConstraints.NORTHEAST;
		gbc_comboBoxFacultad.gridx = 2;
		gbc_comboBoxFacultad.gridy = 1;
		panelBotones.add(comboBoxFacultad, gbc_comboBoxFacultad);
		
		lblSeleccioneCarreras = new JLabel("SELECCIONAR ASIGNATURAS");
		lblSeleccioneCarreras.setHorizontalAlignment(SwingConstants.CENTER);
		lblSeleccioneCarreras.setFont(new Font("Tahoma", Font.BOLD, 18));
		add(lblSeleccioneCarreras, BorderLayout.NORTH);
		add(contenedor, BorderLayout.CENTER);
		panelAsignaturas = new PanelAsignaturas(null);
		contenedor.add(panelAsignaturas);
		add(panelSur, BorderLayout.SOUTH);
	}
	
	public void Listenner(JComboBox comboBox){
        comboBox.addItemListener(
     		   new ItemListener(){
     	             public void itemStateChanged(ItemEvent event){
     	                if (event.getStateChange()==ItemEvent.SELECTED){
     	                	String SQL = "";
     	                	String stringCarrera = comboBoxCarrera.getSelectedItem().toString();
     	                	String stringSemestre = comboBoxSemestre.getSelectedItem().toString();
     	                	String stringFacultad = comboBoxFacultad.getSelectedItem().toString();
     	                	String[] arrayCarrera = stringCarrera.split(",");
     	                	String[] arraySemestre = stringSemestre.split("]");
     	                	String[] arrayFacultad = stringFacultad.split(",");
     	                    if(arrayCarrera[0].substring(1).equals("*") && arraySemestre[0].substring(1).equals("*") && arrayFacultad[0].substring(1).equals("*")) {
     	                    	SQL = "select ID_ASIGNATURA, NOMBRE_ASIGNATURA, ANIO, SEMESTRE "
     	                    			+ "from asignatura "
     	                    			+ "where ID_CARRERA IS NOT NULL";
     	                    }
     	                    else if(arrayCarrera[0].substring(1).equals("*") && arraySemestre[0].substring(1).equals("*") && !arrayFacultad[0].substring(1).equals("*")){
     	                    	SQL = "select a.ID_ASIGNATURA, a.NOMBRE_ASIGNATURA, a.ANIO, a.SEMESTRE "
     	                    			+ "from asignatura a, carrera c, facultad f "
     	                    			+ "where f.ID_FACULTAD = "+arrayFacultad[0].substring(1)+" AND c.ID_FACULTAD = f.ID_FACULTAD AND c.ID_CARRERA = a.ID_CARRERA";
     	                    	//initComboBox("select ID_CARRERA, NOMBRE_CARRERA from carrera where ID_FACULTAD="+arrayFacultad[0].substring(1),null,null);
     	                    }
     	                    else if(!arrayCarrera[0].substring(1).equals("*") && arraySemestre[0].substring(1).equals("*") && arrayFacultad[0].substring(1).equals("*")){
     	                	   SQL = "select ID_ASIGNATURA, NOMBRE_ASIGNATURA, ANIO, SEMESTRE "
     	                	   		+ "from asignatura "
     	                	   		+ "where ID_CARRERA='"+arrayCarrera[0].substring(1)+"'";
     	                    }
     	                    else if(arrayCarrera[0].substring(1).equals("*") && !arraySemestre[0].substring(1).equals("*") && arrayFacultad[0].substring(1).equals("*")){
     	                	  SQL = "select ID_ASIGNATURA, NOMBRE_ASIGNATURA, ANIO, SEMESTRE "
     	                	  		+ "from asignatura "
     	                	  		+ "where SEMESTRE="+arraySemestre[0].substring(1);
     	                    }
     	                    else if(arrayCarrera[0].substring(1).equals("*") && !arraySemestre[0].substring(1).equals("*") && !arrayFacultad[0].substring(1).equals("*")){
     	                    	SQL = "select a.ID_ASIGNATURA, a.NOMBRE_ASIGNATURA, a.ANIO, a.SEMESTRE "
     	                    			+ "from asignatura a, carrera c "
     	                    			+ "where c.ID_FACULTAD = "+arrayFacultad[0].substring(1)+" AND a.SEMESTRE="+arraySemestre[0].substring(1)+" AND c.ID_CARRERA = a.ID_CARRERA";
     	                    }
     	                    else if(!arrayCarrera[0].substring(1).equals("*") && !arraySemestre[0].substring(1).equals("*") && arrayFacultad[0].substring(1).equals("*")){
     	                	   SQL = "select ID_ASIGNATURA, NOMBRE_ASIGNATURA, ANIO, SEMESTRE "
     	                	   		+ "from asignatura "
     	                	   		+ "where ID_CARRERA='"+arrayCarrera[0].substring(1)+"' AND SEMESTRE="+arraySemestre[0].substring(1);
     	                    }
     	                    else if(!arrayCarrera[0].substring(1).equals("*") && arraySemestre[0].substring(1).equals("*") && !arrayFacultad[0].substring(1).equals("*")){
     	                    	SQL = "select a.ID_ASIGNATURA, a.NOMBRE_ASIGNATURA, a.ANIO, a.SEMESTRE "
     	                    			+ "from asignatura a, carrera c, facultad f "
     	                    			+ "where f.ID_FACULTAD = "+arrayFacultad[0].substring(1)+" AND c.ID_CARRERA='"+arrayCarrera[0].substring(1)+"' AND f.ID_FACULTAD = c.ID_FACULTAD AND c.ID_CARRERA = a.ID_CARRERA";
     	                    }
     	                    else if(!arrayCarrera[0].substring(1).equals("*") && !arraySemestre[0].substring(1).equals("*") && !arrayFacultad[0].substring(1).equals("*")){
     	                    	SQL = "select a.ID_ASIGNATURA, a.NOMBRE_ASIGNATURA, a.ANIO, a.SEMESTRE "
     	                    			+ "from asignatura a, carrera c, facultad f "
     	                    			+ "where a.SEMESTRE = "+arraySemestre[0].substring(1)+" AND f.ID_FACULTAD = "+arrayFacultad[0].substring(1)+" AND c.ID_CARRERA='"+arrayCarrera[0].substring(1)+"' AND f.ID_FACULTAD = c.ID_FACULTAD AND c.ID_CARRERA = a.ID_CARRERA";
     	                    }
     	                    showA(SQL);
     	                }
     	             }
     	         });
	}
	
	public void initComboBox(String carrera, String semestre, String facultad){
		this.contenedor.getComponent(posPBotones).setVisible(false);
		if(carrera == null) carrera = "select ID_CARRERA, NOMBRE_CARRERA from carrera";
		if(semestre == null) semestre = "select DISTINCT SEMESTRE from asignatura";
		if(facultad == null) facultad = "select ID_FACULTAD, NOMBRE_FACULTAD from facultad";
		JComboBox comboBoxCarrera = new JComboBox(opcionesComboBox(carrera,1));
		Listenner(comboBoxCarrera);
		JComboBox comboBoxSemestre = new JComboBox(opcionesComboBox(semestre,2));
		Listenner(comboBoxSemestre);
		JComboBox comboBoxFacultad = new JComboBox(opcionesComboBox(facultad,1));
		Listenner(comboBoxFacultad);
		JPanel panelBotones = new JPanel();
		panelBotones.add(comboBoxCarrera);
		panelBotones.add(comboBoxCarrera);
		panelBotones.add(comboBoxCarrera);
		this.contenedor.add(panelBotones);
		this.contenedor.repaint();
		posPBotones = contador+1;
	}
	
	public void showA(String string){
	    this.contenedor.getComponent(contador).setVisible(false);
		PanelAsignaturas panelAsignaturas = new PanelAsignaturas(string);
		this.contenedor.add(panelAsignaturas);
		this.contenedor.repaint();
		contador++;
	}
	
	public Vector opcionesComboBox(String sql, int opcion){
		try {
		    ResultSet rs = Conexion.ejecutarSQL(sql);
		    ResultSetMetaData md = rs.getMetaData();
		    ArrayList data = new ArrayList();
		    Vector dataVector = new Vector();
		    if(opcion == 1) dataVector.add("[*,*]");
		    else dataVector.add("[*]");
		    int columns = md.getColumnCount();
		    while (rs.next()){
		        ArrayList row = new ArrayList(columns);
		        for (int i = 1; i <= columns; i++)
		            row.add(rs.getObject(i));
		        data.add(row);
		    }
		    for (int i = 0; i < data.size(); i++) {
		        ArrayList subArray = (ArrayList) data.get(i);
		        Vector subVector = new Vector();
		        for (int j = 0; j < subArray.size(); j++)
		            subVector.add(subArray.get(j));
		        dataVector.add(subVector);
		      }
		    return dataVector;
		} catch (Exception e) {
			return null;
		}
	}
	
}
