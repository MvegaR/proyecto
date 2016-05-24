package gui;

import javax.swing.JPanel;

public class PanelEnBlancoRaul extends JPanel {

    /**
     * 
     */
    private static final long serialVersionUID = 1L;
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