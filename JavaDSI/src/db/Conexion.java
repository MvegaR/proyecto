package db;

import java.sql.*;

import javax.swing.JOptionPane;

public class Conexion {
    
    //* Server Local
	private static String user = "root";
	private static String pass = "";
	private static String serverYNombre = "localhost:3306/dsi01";
    //*/
	
    /* Server remoto 
	private static String user = "dci01";
	private static String pass = "@01icd@";
	private static String serverYNombre = "146.83.198.35/dci01";
    //*/
	

    public static ResultSet ejecutarSQL(String sql){
	try {
		Connection con;
		Class.forName("com.mysql.jdbc.Driver");
		con = DriverManager.getConnection("jdbc:mysql://"+serverYNombre,user,pass);
	    Statement stmt = con.createStatement();
	    stmt.execute(sql);
	    con.close();
	    return stmt.getResultSet();
	} catch (Exception e) {
		JOptionPane.showMessageDialog(null,
		        "Error al conectar con la base de datos",
		        "Error Base de Datos",
		        JOptionPane.ERROR_MESSAGE);
		System.exit(0);
	}
	    return null;
    }
    
    public static boolean PruebaConexion(){
    	try {
    		Connection con;
    		Class.forName("com.mysql.jdbc.Driver");
    		con = DriverManager.getConnection("jdbc:mysql://"+serverYNombre,user,pass);
    	    con.close();
    	    return true;
    	} catch (Exception e) {
    		JOptionPane.showMessageDialog(null,
    		        "Error al conectar con la base de datos",
    		        "Error Base de Datos",
    		        JOptionPane.ERROR_MESSAGE);
    		System.exit(0);
    	}
    	return false;
    }
    
}
