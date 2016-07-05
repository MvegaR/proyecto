package db;

import java.sql.ResultSet;
import java.sql.SQLException;

public class Dia {
    private Integer idDia;
    private String nombreDia;
    public Dia(Integer idDia, String nombreDia) {
	this.idDia = idDia;
	this.nombreDia = nombreDia;
    }
    
    public Dia(ResultSet datos) {
	try {
	    this.idDia = datos.getInt(1) == 0 ? null: datos.getInt(1);
	    this.nombreDia = datos.getString(2);
	} catch (SQLException e) {
	    // TODO Auto-generated catch block
	    e.printStackTrace();
	}
    }

    /**
     * @return the idDia
     */
    public Integer getIdDia() {
        return idDia;
    }

    /**
     * @return the nombreDia
     */
    public String getNombreDia() {
        return nombreDia;
    }

    /* (non-Javadoc)
     * @see java.lang.Object#toString()
     */
    @Override
    public String toString() {
	return "Dia [nombreDia=" + nombreDia + "]";
    }

    /* (non-Javadoc)
     * @see java.lang.Object#hashCode()
     */
    @Override
    public int hashCode() {
	final int prime = 31;
	int result = 1;
	result = prime * result + ((idDia == null) ? 0 : idDia.hashCode());
	return result;
    }

    /* (non-Javadoc)
     * @see java.lang.Object#equals(java.lang.Object)
     */
    @Override
    public boolean equals(Object obj) {
	if (this == obj) {
	    return true;
	}
	if (obj == null) {
	    return false;
	}
	if (!(obj instanceof Dia)) {
	    return false;
	}
	Dia other = (Dia) obj;
	if (idDia == null) {
	    if (other.idDia != null) {
		return false;
	    }
	} else if (!idDia.equals(other.idDia)) {
	    return false;
	}
	return true;
    }
    
    
}
