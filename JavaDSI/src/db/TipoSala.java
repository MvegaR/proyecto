package db;

import java.sql.ResultSet;
import java.sql.SQLException;

public class TipoSala {
    private Integer idTipoSala;
    private String nombreTipoSala;
    public TipoSala(Integer idTipoSala, String nombreTipoSala) {
	this.idTipoSala = idTipoSala;
	this.nombreTipoSala = nombreTipoSala;
    }
    
    public TipoSala(ResultSet datos) {
	try {
	    this.idTipoSala = datos.getInt(1);
	    this.nombreTipoSala = datos.getString(2);
	} catch (SQLException e) {
	    // TODO Auto-generated catch block
	    e.printStackTrace();
	}
	
    }

    /* (non-Javadoc)
     * @see java.lang.Object#toString()
     */
    @Override
    public String toString() {
	return "TipoSala [nombreTipoSala=" + nombreTipoSala + "]";
    }

    /**
     * @return the idTipoSala
     */
    public Integer getIdTipoSala() {
        return idTipoSala;
    }

    /**
     * @return the nombreTipoSala
     */
    public String getNombreTipoSala() {
        return nombreTipoSala;
    }

    /* (non-Javadoc)
     * @see java.lang.Object#hashCode()
     */
    @Override
    public int hashCode() {
	final int prime = 31;
	int result = 1;
	result = prime * result + ((idTipoSala == null) ? 0 : idTipoSala.hashCode());
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
	if (!(obj instanceof TipoSala)) {
	    return false;
	}
	TipoSala other = (TipoSala) obj;
	if (idTipoSala == null) {
	    if (other.idTipoSala != null) {
		return false;
	    }
	} else if (!idTipoSala.equals(other.idTipoSala)) {
	    return false;
	}
	return true;
    }
    
    

}
