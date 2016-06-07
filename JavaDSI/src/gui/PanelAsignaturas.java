package gui;

import java.sql.ResultSet;
import java.sql.ResultSetMetaData;
import java.util.ArrayList;
import java.util.Vector;
import javax.swing.JPanel;
import javax.swing.JScrollPane;
import javax.swing.JTable;
import javax.swing.table.TableColumnModel;

import db.Conexion;

public class PanelAsignaturas extends JPanel {

    private static final long serialVersionUID = 1L;
    private JTable table;
    private JScrollPane scrollPane;

    /**
     * Create the panel.
     */

    @SuppressWarnings({ "rawtypes", "unchecked", "serial" })
    public PanelAsignaturas(String sql){
	try{
	    if(sql == null) sql = "select ID_ASIGNATURA, NOMBRE_ASIGNATURA, ANIO, SEMESTRE from asignatura where ID_CARRERA IS NOT NULL";
	    ResultSet result = Conexion.ejecutarSQL(sql);
	    ResultSetMetaData md = result.getMetaData();
	    ArrayList data = new ArrayList();
	    int cantidad = md.getColumnCount();
	    while (result.next())
	    {
		ArrayList row = new ArrayList(cantidad);

		for (int i = 1; i <= cantidad; i++)
		{
		    row.add( result.getObject(i) );
		}

		data.add( row );
	    }
	    Vector columnNamesVector = new Vector();
	    Vector dataVector = new Vector();

	    for (int i = 0; i < data.size(); i++)
	    {
		ArrayList subArray = (ArrayList)data.get(i);
		Vector subVector = new Vector();
		for (int j = 0; j < subArray.size(); j++)
		{
		    subVector.add(subArray.get(j));
		}
		dataVector.add(subVector);
	    }
	    columnNamesVector.add("CODIDO");
	    columnNamesVector.add("NOMBRE");
	    columnNamesVector.add("AÑO");
	    columnNamesVector.add("SEMESTRE");

	    table = new JTable(dataVector, columnNamesVector)
	    {
		public Class getColumnClass(int column)
		{
		    for (int row = 0; row < getRowCount(); row++)
		    {
			Object o = getValueAt(row, column);

			if (o != null)
			{
			    return o.getClass();
			}
		    }
		    return Object.class;
		}
	    };
	    TableColumnModel columnModel = table.getColumnModel();
	    columnModel.getColumn(1).setPreferredWidth(250);
	    table.getSelectionModel().setSelectionInterval(0,table.getRowCount());

	    scrollPane = new JScrollPane(table);
	    add(scrollPane);
	}catch (Exception e){
	    System.out.println("error");
	}
    }

}