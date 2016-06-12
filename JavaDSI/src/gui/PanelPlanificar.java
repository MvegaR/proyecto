package gui;

import javax.swing.JPanel;
import javax.swing.tree.DefaultMutableTreeNode;
import javax.swing.tree.TreeModel;
import javax.swing.BoxLayout;
import java.awt.BorderLayout;
import java.awt.FlowLayout;
import java.awt.event.ActionEvent;
import java.awt.event.ActionListener;
import java.util.ArrayList;
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
		btnNewButton.addActionListener(new ActionListener() {
			public void actionPerformed(ActionEvent arg0) {
				TreeModel model = panelAsignaturas.getTree().getModel();
			    DefaultMutableTreeNode root = (DefaultMutableTreeNode) model.getRoot();
			    ArrayList<String> codigosAsignaturas = new ArrayList<String>(); //Almacena los codigos de las asignaturas
			    for(int i=0; i < root.getChildCount(); i++){
			    	for(int j=0; j < root.getChildAt(i).getChildCount(); j++){
			    		for(int x=0; x < root.getChildAt(i).getChildAt(j).getChildCount(); x++){
			    			for(int y=0; y < root.getChildAt(i).getChildAt(j).getChildAt(x).getChildCount(); y++){
			    				DefaultMutableTreeNode nodo = (DefaultMutableTreeNode) root.getChildAt(i).getChildAt(j).getChildAt(x).getChildAt(y);
			    				CheckBoxNode checkBox = (CheckBoxNode)nodo.getUserObject();
			    			    if(checkBox.status == Status.SELECTED){
			    			    	codigosAsignaturas.add(checkBox.label.toString().split("]")[0].substring(1));
			    			    }
			    			}
			    		}
			    	}
			    }
			}
		});
		panelSur.add(btnNewButton);
		this.add(panelNorte, BorderLayout.NORTH);
		this.add(panelCentro, BorderLayout.CENTER);
		this.add(panelSur, BorderLayout.SOUTH);
	}
}