package gui;

import javax.swing.JPanel;
import javax.swing.JScrollPane;
import javax.swing.JTree;
import javax.swing.UIManager;
import javax.swing.UnsupportedLookAndFeelException;
import javax.swing.WindowConstants;
import javax.swing.event.CellEditorListener;
import javax.swing.event.ChangeEvent;
import javax.swing.event.TreeModelEvent;
import javax.swing.event.TreeModelListener;
import javax.swing.tree.DefaultMutableTreeNode;
import javax.swing.tree.DefaultTreeCellRenderer;
import javax.swing.tree.DefaultTreeModel;
import javax.swing.tree.TreeCellEditor;
import javax.swing.tree.TreeCellRenderer;
import javax.swing.tree.TreeModel;
import javax.swing.tree.TreePath;

import db.Dia;
import db.Edificio;
import db.Facultad;
import db.Sala;
import db.TipoSala;

import java.awt.BorderLayout;
import java.awt.Color;
import java.awt.Component;
import java.awt.Dimension;
import java.awt.EventQueue;
import java.awt.Graphics;
import java.awt.Graphics2D;
import java.awt.Rectangle;
import java.awt.event.ActionEvent;
import java.awt.event.ActionListener;
import java.awt.event.MouseEvent;
import java.util.ArrayList;
import java.util.Enumeration;
import java.util.EventObject;
import java.util.Objects;

import javax.swing.BorderFactory;
import javax.swing.BoxLayout;
import javax.swing.Icon;
import javax.swing.JCheckBox;
import javax.swing.JFrame;
import javax.swing.JLabel;

public class PanelSalasYDias extends JPanel {

    private static final long serialVersionUID = 1L;
    private JLabel tituloSalas;
    private String titulo;
    private JTree tree;
    private static VentanaPrincipal ventana;
    
    public PanelSalasYDias(VentanaPrincipal ventana) {
	super(new BorderLayout());
	PanelSalasYDias.ventana = ventana;
	titulo = "<html><body><h2><strong><center>SELECCIONE SALAS Y DÍAS</center></strong></h2></body></html>";
	tituloSalas = new JLabel(titulo);
	tituloSalas.setForeground(new Color(255, 255, 255));
	tituloSalas.setAlignmentX(Component.CENTER_ALIGNMENT);

	tree = new JTree() {

	    private static final long serialVersionUID = 1L;

	    @Override public void updateUI() {
		setCellRenderer(null);
		setCellEditor(null);
		super.updateUI();
		//???#1: JDK 1.6.0 bug??? Nimbus LnF
		setCellRenderer(new CheckBoxNodeRenderer());
		setCellEditor(new CheckBoxNodeEditor());
	    }
	};
	//SalasYDias -> 
	//salas -> facultad/sinFacultad -> edificio -> tipo -> sala
	//dias -> dia
	//*
	tree.setModel(new DefaultTreeModel(new DefaultMutableTreeNode("Salas y Días"){
	    private static final long serialVersionUID = 1L;
	    {
		DefaultMutableTreeNode nodoSalas = new DefaultMutableTreeNode("Salas");
		for(Facultad facultad: ventana.getFacultades()){
		    DefaultMutableTreeNode nodoFacultad = new DefaultMutableTreeNode(facultad.getNombreFacultad());
		    for(Edificio edificio: ventana.getEdificios()){
			if(edificio.getIdFacultad()!=null && edificio.getIdFacultad().equals(facultad.getIdFacultad())){
			    DefaultMutableTreeNode nodoEdificio = new DefaultMutableTreeNode(edificio.getNombreEdificio());
			    for(TipoSala tipoSala: ventana.getTiposSala()){
				DefaultMutableTreeNode nodoTipoSala = new DefaultMutableTreeNode(tipoSala.getNombreTipoSala());
				Boolean tiene = false;
				for(Sala sala: ventana.getSalas()){
				    if(sala.getIdEdificio().equals(edificio.getIdEdificio()) && sala.getIdTipoSala().equals(tipoSala.getIdTipoSala())){
					DefaultMutableTreeNode nodoSala = new DefaultMutableTreeNode(sala.getIdSala());
					tiene = true;
					nodoTipoSala.add(nodoSala);
				    }
				}
				if(tiene){
				    nodoEdificio.add(nodoTipoSala);
				}
			    }
			    nodoFacultad.add(nodoEdificio);
			    
			}

		    }
		    nodoSalas.add(nodoFacultad);
		    
		}
		DefaultMutableTreeNode nodoSinFacultad = new DefaultMutableTreeNode("Edificios sin facultad");
		for(Edificio edificio: ventana.getEdificios()){
		    if(edificio.getIdFacultad() == null){
			DefaultMutableTreeNode nodoEdifico = new DefaultMutableTreeNode(edificio.getNombreEdificio());
			for(TipoSala tipo: ventana.getTiposSala()){
			    DefaultMutableTreeNode nodoTipo = new DefaultMutableTreeNode(tipo.getNombreTipoSala());
			    Boolean tiene = false;
			    for(Sala sala: ventana.getSalas()){
				if(sala.getIdEdificio().equals(edificio.getIdEdificio()) && sala.getIdTipoSala().equals(tipo.getIdTipoSala())){
				    DefaultMutableTreeNode nodoSala = new DefaultMutableTreeNode(sala.getIdSala());
				    tiene = true;
				    nodoTipo.add(nodoSala);
				}
			    }
			    if(tiene){
				nodoEdifico.add(nodoTipo);
			    }
			}
			nodoSinFacultad.add(nodoEdifico);
		    }
		    
		}
		nodoSalas.add(nodoSinFacultad);
		add(nodoSalas);
		DefaultMutableTreeNode nodoDias = new DefaultMutableTreeNode("Días");
		for(Dia dia: ventana.getDias()){
		    DefaultMutableTreeNode nodoDia = new DefaultMutableTreeNode(dia.getNombreDia());
		    nodoDias.add(nodoDia);
		}
		add(nodoDias);
		

	    }

	}));
	TreeModel model = tree.getModel();
	DefaultMutableTreeNode root = (DefaultMutableTreeNode) model.getRoot();
	@SuppressWarnings("rawtypes")
	Enumeration e = root.breadthFirstEnumeration();
	while (e.hasMoreElements()) {
	    DefaultMutableTreeNode node = (DefaultMutableTreeNode) e.nextElement();
	    Object o = node.getUserObject();
	    if (o instanceof String) {
		node.setUserObject(new CheckBoxNode((String) o, Status.DESELECTED));
	    }
	}
	model.addTreeModelListener(new CheckBoxStatusUpdateListener());
	tree.setEditable(true);
	tree.setBorder(BorderFactory.createEmptyBorder(4, 4, 4, 4));
	tree.expandRow(0);
	setBorder(BorderFactory.createEmptyBorder(5, 5, 5, 5));
	setLayout(new BoxLayout(this, BoxLayout.Y_AXIS));
	add(tituloSalas);
	add(new JScrollPane(tree));
	setPreferredSize(new Dimension(320, 240));


    }
    public static void createAndShowGUI() {
	try {
	    UIManager.setLookAndFeel(UIManager.getSystemLookAndFeelClassName());
	    //for (UIManager.LookAndFeelInfo laf: UIManager.getInstalledLookAndFeels())
	    //  if ("Nimbus".equals(laf.getName())) { UIManager.setLookAndFeel(laf.getClassName()); }
	} catch (ClassNotFoundException | InstantiationException
		| IllegalAccessException | UnsupportedLookAndFeelException ex) {
	    ex.printStackTrace();
	}
	JFrame frame = new JFrame("CheckBoxNodeEditor");
	frame.setDefaultCloseOperation(WindowConstants.EXIT_ON_CLOSE);
	frame.getContentPane().add(new PanelSalasYDias(ventana));
	frame.pack();
	frame.setLocationRelativeTo(null);
	frame.setVisible(true);
    }
    public JTree getTree(){
	return tree;
    }
    
    public ArrayList<Sala> getSalasSeleccionadas(){
	ArrayList<Sala> salas = new ArrayList<Sala>();
	DefaultMutableTreeNode root = (DefaultMutableTreeNode) this.getTree().getModel().getRoot();
	DefaultMutableTreeNode nodoDeSalas = (DefaultMutableTreeNode) root.getChildAt(0);
	for(int i = 0; i < nodoDeSalas.getChildCount(); i++){ //Facultades,existe virtualmente facultad "edificios sin facultad"
	    DefaultMutableTreeNode nodoDeFacultades = (DefaultMutableTreeNode) nodoDeSalas.getChildAt(i);
	    for(int j = 0; j < nodoDeFacultades.getChildCount(); j++){
		DefaultMutableTreeNode nodoDeEdificios = (DefaultMutableTreeNode) nodoDeFacultades.getChildAt(j);
		for(int k = 0; k < nodoDeEdificios.getChildCount(); k++){
		    DefaultMutableTreeNode nodoDeTipos = (DefaultMutableTreeNode) nodoDeEdificios.getChildAt(k);
		    for(int l = 0; l < nodoDeTipos.getChildCount(); l++){
			DefaultMutableTreeNode nodoDeSala = (DefaultMutableTreeNode) nodoDeTipos.getChildAt(l);
			if( ((CheckBoxNode)nodoDeSala.getUserObject()).status.equals(Status.SELECTED) ){
			    salas.add(ventana.getSala(nodoDeSala.toString()));
			}
		    }
		}
	    }
	    
	}
	
	return salas;
    }
    //System.out.println( ((CheckBoxNode)((DefaultMutableTreeNode)nodoDia.getUserObject()).getUserObject()).status.toString());
    public ArrayList<Integer> getDiasSeleccionados(){
	ArrayList<Integer> dias = new ArrayList<Integer>();
	DefaultMutableTreeNode root = (DefaultMutableTreeNode) this.getTree().getModel().getRoot();
	DefaultMutableTreeNode nodoDeDias = (DefaultMutableTreeNode) root.getChildAt(1);
	for(int i = 0; i < nodoDeDias.getChildCount(); i++){
	    DefaultMutableTreeNode nodoDia = new DefaultMutableTreeNode(nodoDeDias.getChildAt(i));
	    if(((CheckBoxNode)((DefaultMutableTreeNode)nodoDia.getUserObject()).getUserObject()).status.equals(Status.SELECTED)){
		dias.add(i+1);
	    }
	}
	return dias;
    }


    
    
}

class TriStateCheckBox extends JCheckBox {

    private static final long serialVersionUID = 1L;
    private Icon currentIcon;
    @Override public void updateUI() {
	currentIcon = getIcon();
	setIcon(null);
	super.updateUI();
	EventQueue.invokeLater(new Runnable() {
	    @Override public void run() {
		if (currentIcon != null) {
		    setIcon(new IndeterminateIcon());
		}
		setOpaque(false);
	    }
	});
    }
}

class IndeterminateIcon implements Icon {
    private static final Color FOREGROUND = new Color(50, 20, 255, 200); //TEST: UIManager.getColor("CheckBox.foreground");
    private static final int SIDE_MARGIN = 4;
    private static final int HEIGHT = 2;
    private final Icon icon = UIManager.getIcon("CheckBox.icon");
    @Override public void paintIcon(Component c, Graphics g, int x, int y) {
	icon.paintIcon(c, g, x, y);
	int w = getIconWidth();
	int h = getIconHeight();
	Graphics2D g2 = (Graphics2D) g.create();
	g2.setPaint(FOREGROUND);
	g2.translate(x, y);
	g2.fillRect(SIDE_MARGIN, (h - HEIGHT) / 2, w - SIDE_MARGIN - SIDE_MARGIN, HEIGHT);
	//g2.translate(-x, -y);
	g2.dispose();
    }
    @Override public int getIconWidth() {
	return icon.getIconWidth();
    }
    @Override public int getIconHeight() {
	return icon.getIconHeight();
    }
}

enum Status { SELECTED, DESELECTED, INDETERMINATE }

class CheckBoxNode {
    public final String label;
    public Status status;
    public CheckBoxNode(String label) {
	this.label = label;
	status = Status.INDETERMINATE;
    }
    public CheckBoxNode(String label, Status status) {
	this.label = label;
	this.status = status;
    }
    @Override public String toString() {
	return label;
    }
}

class CheckBoxStatusUpdateListener implements TreeModelListener {
    private boolean adjusting;
    
    @Override public void treeNodesChanged(TreeModelEvent e) {
	if (adjusting) {
	    return;
	}
	adjusting = true;
	TreePath parent = e.getTreePath();
	Object[] children = e.getChildren();
	DefaultTreeModel model = (DefaultTreeModel) e.getSource();

	DefaultMutableTreeNode node;
	CheckBoxNode c; // = (CheckBoxNode) node.getUserObject();
	if (children != null && children.length == 1) {
	    node = (DefaultMutableTreeNode) children[0];
	    c = (CheckBoxNode) node.getUserObject();
	    DefaultMutableTreeNode n = (DefaultMutableTreeNode) parent.getLastPathComponent();
	    while (n != null) {
		updateParentUserObject(n);
		DefaultMutableTreeNode tmp = (DefaultMutableTreeNode) n.getParent();
		if (tmp == null) {
		    break;
		} else {
		    n = tmp;
		}
	    }
	    model.nodeChanged(n);
	} else {
	    node = (DefaultMutableTreeNode) model.getRoot();
	    c = (CheckBoxNode) node.getUserObject();
	}
	updateAllChildrenUserObject(node, c.status);
	model.nodeChanged(node);
	adjusting = false;
    }
    private void updateParentUserObject(DefaultMutableTreeNode parent) {
	String label = ((CheckBoxNode) parent.getUserObject()).label;
	int selectedCount = 0;
	int indeterminateCount = 0;
	@SuppressWarnings("rawtypes")
	Enumeration children = parent.children();
	while (children.hasMoreElements()) {
	    DefaultMutableTreeNode node = (DefaultMutableTreeNode) children.nextElement();
	    CheckBoxNode check = (CheckBoxNode) node.getUserObject();
	    if (check.status == Status.INDETERMINATE) {
		indeterminateCount++;
		break;
	    }
	    if (check.status == Status.SELECTED) {
		selectedCount++;
	    }
	}
	if (indeterminateCount > 0) {
	    parent.setUserObject(new CheckBoxNode(label));
	} else if (selectedCount == 0) {
	    parent.setUserObject(new CheckBoxNode(label, Status.DESELECTED));
	} else if (selectedCount == parent.getChildCount()) {
	    parent.setUserObject(new CheckBoxNode(label, Status.SELECTED));
	} else {
	    parent.setUserObject(new CheckBoxNode(label));
	}
    }
    private void updateAllChildrenUserObject(DefaultMutableTreeNode root, Status status) {
	@SuppressWarnings("rawtypes")
	Enumeration breadth = root.breadthFirstEnumeration();
	while (breadth.hasMoreElements()) {
	    DefaultMutableTreeNode node = (DefaultMutableTreeNode) breadth.nextElement();
	    if (Objects.equals(root, node)) {
		continue;
	    }
	    CheckBoxNode check = (CheckBoxNode) node.getUserObject();
	    node.setUserObject(new CheckBoxNode(check.label, status));
	}
    }
    @Override public void treeNodesInserted(TreeModelEvent e)    { /* not needed */ }
    @Override public void treeNodesRemoved(TreeModelEvent e)     { /* not needed */ }
    @Override public void treeStructureChanged(TreeModelEvent e) { /* not needed */ }
}

//*
// extends JCheckBox TreeCellRenderer Editor version
class CheckBoxNodeRenderer extends TriStateCheckBox implements TreeCellRenderer {
    /**
     * 
     */
    private static final long serialVersionUID = 1L;
    private final DefaultTreeCellRenderer renderer = new DefaultTreeCellRenderer();
    private final JPanel panel = new JPanel(new BorderLayout());
    public CheckBoxNodeRenderer() {
	super();
	String uiName = getUI().getClass().getName();
	if (uiName.contains("Synth") && System.getProperty("java.version").startsWith("1.7.0")) {
	    System.out.println("XXX: FocusBorder bug?, JDK 1.7.0, Nimbus start LnF");
	    renderer.setBackgroundSelectionColor(new Color(0, 0, 0, 0));
	}
	panel.setFocusable(false);
	panel.setRequestFocusEnabled(false);
	panel.setOpaque(false);
	panel.add(this, BorderLayout.WEST);
	this.setOpaque(false);
    }
    @Override public Component getTreeCellRendererComponent(JTree tree, Object value, boolean selected, boolean expanded, boolean leaf, int row, boolean hasFocus) {
	JLabel l = (JLabel) renderer.getTreeCellRendererComponent(tree, value, selected, expanded, leaf, row, hasFocus);
	l.setFont(tree.getFont());
	if (value instanceof DefaultMutableTreeNode) {
	    this.setEnabled(tree.isEnabled());
	    this.setFont(tree.getFont());
	    Object userObject = ((DefaultMutableTreeNode) value).getUserObject();
	    if (userObject instanceof CheckBoxNode) {
		CheckBoxNode node = (CheckBoxNode) userObject;
		if (node.status == Status.INDETERMINATE) {
		    setIcon(new IndeterminateIcon());
		} else {
		    setIcon(null);
		}
		l.setText(node.label);
		setSelected(node.status == Status.SELECTED);
	    }
	    //panel.add(this, BorderLayout.WEST);
	    panel.add(l);
	    return panel;
	}
	return l;
    }
    @Override public void updateUI() {
	super.updateUI();
	if (panel != null) {
	    //panel.removeAll(); //??? Change to Nimbus LnF, JDK 1.6.0
	    panel.updateUI();
	    //panel.add(this, BorderLayout.WEST);
	}
	setName("Tree.cellRenderer");
	//???#1: JDK 1.6.0 bug??? @see 1.7.0 DefaultTreeCellRenderer#updateUI()
	//if (System.getProperty("java.version").startsWith("1.6.0")) {
	//    renderer = new DefaultTreeCellRenderer();
	//}
    }
}

class CheckBoxNodeEditor extends TriStateCheckBox implements TreeCellEditor {
    /**
     * 
     */
    private static final long serialVersionUID = 1L;
    private final DefaultTreeCellRenderer renderer = new DefaultTreeCellRenderer();
    private final JPanel panel = new JPanel(new BorderLayout());
    private String str;

    public CheckBoxNodeEditor() {
	super();
	this.addActionListener(new ActionListener() {
	    @Override public void actionPerformed(ActionEvent e) {
		//System.out.println("actionPerformed: stopCellEditing");
		stopCellEditing();
	    }
	});
	panel.setFocusable(false);
	panel.setRequestFocusEnabled(false);
	panel.setOpaque(false);
	panel.add(this, BorderLayout.WEST);
	this.setOpaque(false);
    }
    @Override public Component getTreeCellEditorComponent(JTree tree, Object value, boolean isSelected, boolean expanded, boolean leaf, int row) {
	//JLabel l = (JLabel) renderer.getTreeCellRendererComponent(tree, value, selected, expanded, leaf, row, hasFocus);
	JLabel l = (JLabel) renderer.getTreeCellRendererComponent(tree, value, true, expanded, leaf, row, true);
	l.setFont(tree.getFont());
	if (value instanceof DefaultMutableTreeNode) {
	    this.setEnabled(tree.isEnabled());
	    this.setFont(tree.getFont());
	    Object userObject = ((DefaultMutableTreeNode) value).getUserObject();
	    if (userObject instanceof CheckBoxNode) {
		CheckBoxNode node = (CheckBoxNode) userObject;
		if (node.status == Status.INDETERMINATE) {
		    setIcon(new IndeterminateIcon());
		} else {
		    setIcon(null);
		}
		l.setText(node.label);
		setSelected(node.status == Status.SELECTED);
		str = node.label;
	    }
	    //panel.add(this, BorderLayout.WEST);
	    panel.add(l);
	    return panel;
	}
	return l;
    }
    @Override public Object getCellEditorValue() {
	return new CheckBoxNode(str, isSelected() ? Status.SELECTED : Status.DESELECTED);
    }
    @Override public boolean isCellEditable(EventObject e) {
	if (e instanceof MouseEvent && e.getSource() instanceof JTree) {
	    MouseEvent me = (MouseEvent) e;
	    JTree tree = (JTree) e.getSource();
	    TreePath path = tree.getPathForLocation(me.getX(), me.getY());
	    Rectangle r = tree.getPathBounds(path);
	    if (r == null) {
		return false;
	    }
	    Dimension d = getPreferredSize();
	    r.setSize(new Dimension(d.width, r.height));
	    if (r.contains(me.getX(), me.getY())) {
		if (str == null && System.getProperty("java.version").startsWith("1.7.0")) {
		    System.out.println("XXX: Java 7, only on first run\n" + getBounds());
		    setBounds(new Rectangle(0, 0, d.width, r.height));
		}
		//System.out.println(getBounds());
		return true;
	    }
	}
	return false;
    }
    @Override public void updateUI() {
	super.updateUI();
	setName("Tree.cellEditor");
	if (panel != null) {
	    //panel.removeAll(); //??? Change to Nimbus LnF, JDK 1.6.0
	    panel.updateUI();
	    //panel.add(this, BorderLayout.WEST);
	}
	//???#1: JDK 1.6.0 bug??? @see 1.7.0 DefaultTreeCellRenderer#updateUI()
	//if (System.getProperty("java.version").startsWith("1.6.0")) {
	//    renderer = new DefaultTreeCellRenderer();
	//}
    }

    //Copied from AbstractCellEditor
    //     protected EventListenerList listenerList = new EventListenerList();
    //     protected transient ChangeEvent changeEvent;
    @Override public boolean shouldSelectCell(EventObject anEvent) {
	return true;
    }
    @Override public boolean stopCellEditing() {
	fireEditingStopped();
	return true;
    }
    @Override public void cancelCellEditing() {
	fireEditingCanceled();
    }
    @Override public void addCellEditorListener(CellEditorListener l) {
	listenerList.add(CellEditorListener.class, l);
    }
    @Override public void removeCellEditorListener(CellEditorListener l) {
	listenerList.remove(CellEditorListener.class, l);
    }
    public CellEditorListener[] getCellEditorListeners() {
	return listenerList.getListeners(CellEditorListener.class);
    }
    protected void fireEditingStopped() {
	// Guaranteed to return a non-null array
	Object[] listeners = listenerList.getListenerList();
	// Process the listeners last to first, notifying
	// those that are interested in this event
	for (int i = listeners.length - 2; i >= 0; i -= 2) {
	    if (listeners[i] == CellEditorListener.class) {
		// Lazily create the event:
		if (changeEvent == null) {
		    changeEvent = new ChangeEvent(this);
		}
		((CellEditorListener) listeners[i + 1]).editingStopped(changeEvent);
	    }
	}
    }
    protected void fireEditingCanceled() {
	// Guaranteed to return a non-null array
	Object[] listeners = listenerList.getListenerList();
	// Process the listeners last to first, notifying
	// those that are interested in this event
	for (int i = listeners.length - 2; i >= 0; i -= 2) {
	    if (listeners[i] == CellEditorListener.class) {
		// Lazily create the event:
		if (changeEvent == null) {
		    changeEvent = new ChangeEvent(this);
		}
		((CellEditorListener) listeners[i + 1]).editingCanceled(changeEvent);
	    }
	}
    }

}



