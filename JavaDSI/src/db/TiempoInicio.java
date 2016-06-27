package db;

import java.sql.ResultSet;
import java.sql.SQLException;

public class TiempoInicio {
    
    private String inicio;

    public TiempoInicio(String inicio) {
	super();
	this.inicio = inicio;
    }
    
    public TiempoInicio(ResultSet datos) {
	try {
	    this.inicio = datos.getString(1);
	} catch (SQLException e) {
	    // TODO Auto-generated catch block
	    e.printStackTrace();
	}
    }
    
    public String getInicio() {
	return inicio;
    }
    
    

}
