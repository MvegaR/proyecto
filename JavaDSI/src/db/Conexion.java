package db;

import java.sql.*;

import javax.swing.JOptionPane;

public class Conexion {
	
	private static String user = "root";
	private static String pass = "";

    public static ResultSet ejecutarSQL(String sql){
	try {
		Connection con;
		Class.forName("com.mysql.jdbc.Driver");
		con = DriverManager.getConnection("jdbc:mysql://localhost:3306/dsi01",user,pass);
	    Statement stmt = con.createStatement();
	    stmt.execute(sql);
	    con.close();
	    return stmt.getResultSet();
	} catch (Exception e) {
		JOptionPane.showMessageDialog(null,
		        "Error al conectar con la base de datos! '",
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
    		con = DriverManager.getConnection("jdbc:mysql://localhost:3306/dsi01",user,pass);
    	    con.close();
    	    return true;
    	} catch (Exception e) {
    		JOptionPane.showMessageDialog(null,
    		        "Error al conectar con la base de datos! '",
    		        "Error Base de Datos",
    		        JOptionPane.ERROR_MESSAGE);
    		System.exit(0);
    	}
    	return false;
    }
    
}
