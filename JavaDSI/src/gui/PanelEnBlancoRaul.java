package gui;

import javax.swing.JPanel;
import javax.swing.GroupLayout;
import javax.swing.GroupLayout.Alignment;
import java.awt.BorderLayout;

public class PanelEnBlancoRaul extends JPanel {

    private PanelEnBlancoConi coni;
    private PanelEnBlancoMarcos marcos;
    private PanelEnBlancoMari mari;
    private PanelEnBlancoPablo pablo;
	
    public PanelEnBlancoRaul() {
    	coni = new PanelEnBlancoConi();
    	marcos = new PanelEnBlancoMarcos();
    	mari = new PanelEnBlancoMari();
    	pablo = new PanelEnBlancoPablo();
    	add(marcos);
    	add(coni);
    	add(mari);
    	add(pablo);
    }

}