package gui;

import javax.swing.JPanel;
import javax.swing.BoxLayout;
import java.awt.BorderLayout;
import java.awt.FlowLayout;
import javax.swing.JButton;

public class PanelPlanificar extends JPanel {

    private static final long serialVersionUID = 1L;
    private JPanel panelNorte, panelCentro, panelSur;
    private PanelTreeSalas panelTreeSalas;
    private PanelAsignaturas panelAsignaturas;
    private JButton btnNewButton;

    public PanelPlanificar(){
	this.setLayout(new BorderLayout(0, 0));
	panelNorte  = new JPanel();
	panelCentro = new JPanel();
	panelSur    = new JPanel();
	panelCentro.setLayout(new BoxLayout(panelCentro, BoxLayout.X_AXIS));
	panelTreeSalas = new PanelTreeSalas();
	panelAsignaturas = new PanelAsignaturas();
	panelCentro.add(panelTreeSalas);
	panelCentro.add(panelAsignaturas);
	panelNorte.setLayout(new FlowLayout());
	btnNewButton = new JButton("Ejecutar Planificación");
	panelSur.add(btnNewButton);
	this.add(panelNorte, BorderLayout.NORTH);
	this.add(panelCentro, BorderLayout.CENTER);
	this.add(panelSur, BorderLayout.SOUTH);
    }

}