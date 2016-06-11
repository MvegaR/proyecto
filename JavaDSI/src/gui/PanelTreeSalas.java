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
import java.util.Enumeration;
import java.util.EventObject;
import java.util.Objects;

import javax.swing.BorderFactory;
import javax.swing.BoxLayout;
import javax.swing.Icon;
import javax.swing.JCheckBox;
import javax.swing.JFrame;
import javax.swing.JLabel;

public class PanelTreeSalas extends JPanel {

    /**
     * 
     */
    private static final long serialVersionUID = 1L;
    private JLabel tituloSalas;
    private String titulo;
    /**
     * Create the panel.
     */
    public PanelTreeSalas() {
	super(new BorderLayout());
	titulo = "<html><body><h2><strong><center>SELECCIONE SALAS</center></strong></h2></body></html>";
	tituloSalas = new JLabel(titulo);
	tituloSalas.setAlignmentX(Component.CENTER_ALIGNMENT);
        JTree tree = new JTree() {
            /**
	     * 
	     */
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
        tree.setModel(new DefaultTreeModel(
        	new DefaultMutableTreeNode("UBB") {
		    private static final long serialVersionUID = 1L;
			{
        			DefaultMutableTreeNode node_1;
        			DefaultMutableTreeNode node_2;
        			DefaultMutableTreeNode node_3;
        			node_1 = new DefaultMutableTreeNode("Facultad1");
        				node_2 = new DefaultMutableTreeNode("Departamento1");
        					node_3 = new DefaultMutableTreeNode("Edificio 1");
        						node_3.add(new DefaultMutableTreeNode("Sala 1"));
        						node_3.add(new DefaultMutableTreeNode("sala 2"));
        						node_3.add(new DefaultMutableTreeNode("sala 3"));
        					node_2.add(node_3);
        					node_3 = new DefaultMutableTreeNode("Edificio 2");
        						node_3.add(new DefaultMutableTreeNode("sala 4"));
        						node_3.add(new DefaultMutableTreeNode("sala 5"));
        					node_2.add(node_3);
        				node_1.add(node_2);
        				node_2 = new DefaultMutableTreeNode("Departamento2");
        					node_3 = new DefaultMutableTreeNode("Edificio 3");
        						node_3.add(new DefaultMutableTreeNode("Sala 6"));
        						node_3.add(new DefaultMutableTreeNode("Sala 8"));
        						node_3.add(new DefaultMutableTreeNode("Sala 9"));
        					node_2.add(node_3);
        					node_3 = new DefaultMutableTreeNode("Edificio 4");
        						node_3.add(new DefaultMutableTreeNode("Sala 10"));
        					node_2.add(node_3);
        				node_1.add(node_2);
        			add(node_1);
        			node_1 = new DefaultMutableTreeNode("Facultad2");
        				node_1.add(new DefaultMutableTreeNode("Departaamento3"));
        			add(node_1);
        			node_1 = new DefaultMutableTreeNode("EdificiosSinDepartamento");
        				node_2 = new DefaultMutableTreeNode("Edificio5");
        					node_2.add(new DefaultMutableTreeNode("Sala 11"));
        					node_2.add(new DefaultMutableTreeNode("Sala 12"));
        				node_1.add(node_2);
        			add(node_1);
        		}
        	}
        ));
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

        //???#1: JDK 1.6.0 bug??? Nimbus LnF
        //tree.setCellRenderer(new CheckBoxNodeRenderer());
        //tree.setCellEditor(new CheckBoxNodeEditor());

        tree.expandRow(0);
        //tree.setToggleClickCount(1);

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
        frame.getContentPane().add(new PanelTreeSalas());
        frame.pack();
        frame.setLocationRelativeTo(null);
        frame.setVisible(true);
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
    public final Status status;
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
/*/
// extends JPanel TreeCellRenderer Editor version
class CheckBoxNodeRenderer extends JPanel implements TreeCellRenderer {
    private DefaultTreeCellRenderer renderer = new DefaultTreeCellRenderer();
    private final TriStateCheckBox check = new TriStateCheckBox();
    public CheckBoxNodeRenderer() {
        super(new BorderLayout());
        String uiName = getUI().getClass().getName();
        if (uiName.contains("Synth") && System.getProperty("java.version").startsWith("1.7.0")) {
            System.out.println("XXX: FocusBorder bug?, JDK 1.7.0, Nimbus start LnF");
            renderer.setBackgroundSelectionColor(new Color(0, 0, 0, 0));
        }
        setFocusable(false);
        setRequestFocusEnabled(false);
        setOpaque(false);
        add(check, BorderLayout.WEST);
        check.setOpaque(false);
    }
    @Override public Component getTreeCellRendererComponent(JTree tree, Object value, boolean selected, boolean expanded, boolean leaf, int row, boolean hasFocus) {
        JLabel l = (JLabel) renderer.getTreeCellRendererComponent(tree, value, selected, expanded, leaf, row, hasFocus);
        l.setFont(tree.getFont());
        if (value instanceof DefaultMutableTreeNode) {
            check.setEnabled(tree.isEnabled());
            check.setFont(tree.getFont());
            Object userObject = ((DefaultMutableTreeNode) value).getUserObject();
            if (userObject instanceof CheckBoxNode) {
                CheckBoxNode node = (CheckBoxNode) userObject;
                if (node.status == Status.INDETERMINATE) {
                    check.setIcon(new IndeterminateIcon());
                } else {
                    check.setIcon(null);
                }
                l.setText(node.label);
                check.setSelected(node.status == Status.SELECTED);
            }
            //add(this, BorderLayout.WEST);
            add(l);
            return this;
        }
        return l;
    }
    @Override public void updateUI() {
        super.updateUI();
        if (check != null) {
            //removeAll(); //??? Change to Nimbus LnF, JDK 1.6.0
            check.updateUI();
            //add(check, BorderLayout.WEST);
        }
        setName("Tree.cellRenderer");
        //???#1: JDK 1.6.0 bug??? @see 1.7.0 DefaultTreeCellRenderer#updateUI()
        //if (System.getProperty("java.version").startsWith("1.6.0")) {
        //    renderer = new DefaultTreeCellRenderer();
        //}
    }
}

class CheckBoxNodeEditor extends JPanel implements TreeCellEditor {
    private DefaultTreeCellRenderer renderer = new DefaultTreeCellRenderer();
    private final TriStateCheckBox check = new TriStateCheckBox();
    private String str = null;
    public CheckBoxNodeEditor() {
        super(new BorderLayout());
        check.addActionListener(new ActionListener() {
            @Override public void actionPerformed(ActionEvent e) {
                //System.out.println("actionPerformed: stopCellEditing");
                stopCellEditing();
            }
        });
        setFocusable(false);
        setRequestFocusEnabled(false);
        setOpaque(false);
        add(check, BorderLayout.WEST);
        check.setOpaque(false);
    }
    @Override public Component getTreeCellEditorComponent(JTree tree, Object value, boolean isSelected, boolean expanded, boolean leaf, int row) {
        //JLabel l = (JLabel) renderer.getTreeCellRendererComponent(tree, value, selected, expanded, leaf, row, hasFocus);
        JLabel l = (JLabel) renderer.getTreeCellRendererComponent(tree, value, true, expanded, leaf, row, true);
        l.setFont(tree.getFont());
        if (value instanceof DefaultMutableTreeNode) {
            check.setEnabled(tree.isEnabled());
            check.setFont(tree.getFont());
            Object userObject = ((DefaultMutableTreeNode) value).getUserObject();
            if (userObject instanceof CheckBoxNode) {
                CheckBoxNode node = (CheckBoxNode) userObject;
                if (node.status == Status.INDETERMINATE) {
                    check.setIcon(new IndeterminateIcon());
                } else {
                    check.setIcon(null);
                }
                l.setText(node.label);
                check.setSelected(node.status == Status.SELECTED);
                str = node.label;
            }
            //add(this, BorderLayout.WEST);
            add(l);
            return this;
        }
        return l;
    }
    @Override public Object getCellEditorValue() {
        return new CheckBoxNode(str, check.isSelected() ? Status.SELECTED : Status.DESELECTED);
    }
    @Override public boolean isCellEditable(EventObject e) {
        if (e instanceof MouseEvent && e.getSource() instanceof JTree) {
            MouseEvent me = (MouseEvent) e;
            JTree tree = (JTree) e.getSource();
            TreePath path = tree.getPathForLocation(me.getX(), me.getY());
            Rectangle r = tree.getPathBounds(path);
            if (r == null) { return false; }
            Dimension d = check.getPreferredSize();
            r.setSize(new Dimension(d.width, r.height));
            if (r.contains(me.getX(), me.getY())) {
                if (str == null && System.getProperty("java.version").startsWith("1.7.0")) {
                    System.out.println("XXX: Java 7, only on first run\n" + getBounds());
                    check.setBounds(new Rectangle(0, 0, d.width, r.height));
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
        if (check != null) {
            //removeAll(); //??? Change to Nimbus LnF, JDK 1.6.0
            check.updateUI();
            //add(check, BorderLayout.WEST);
        }
        //???#1: JDK 1.6.0 bug??? @see 1.7.0 DefaultTreeCellRenderer#updateUI()
        //if (System.getProperty("java.version").startsWith("1.6.0")) {
        //    renderer = new DefaultTreeCellRenderer();
        //}
    }

    //Copied from AbstractCellEditor
    protected EventListenerList listenerList = new EventListenerList();
    protected transient ChangeEvent changeEvent;
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
//*/

    
