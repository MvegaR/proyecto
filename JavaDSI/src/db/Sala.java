package db;

import java.sql.ResultSet;
import java.sql.SQLException;

public class Sala {

    private String idSala;
    private Integer idTipoSala;
    private String idEdificio;
    private Integer capacidadSala;
    public Sala(String idSala, Integer idTipoSala, String idEdificio, Integer capacidadSala) {
	this.idSala = idSala;
	this.idTipoSala = idTipoSala;
	this.idEdificio = idEdificio;
	this.capacidadSala = capacidadSala;
    }
    public Sala(ResultSet datos) {
	try {
	    this.idSala = datos.getString(1);
	    this.idTipoSala = datos.getInt(2);
	    this.idEdificio = datos.getString(3);
	    this.capacidadSala = datos.getInt(4);
	} catch (SQLException e) {
	    // TODO Auto-generated catch block
	    e.printStackTrace();
	}
    }
    /**
     * @return the idSala
     */
    public String getIdSala() {
	return idSala;
    }
    /**
     * @return the idTipoSala
     */
    public Integer getIdTipoSala() {
	return idTipoSala;
    }
    /**
     * @return the idEdificio
     */
    public String getIdEdificio() {
	return idEdificio;
    }
    /**
     * @return the capacidadSala
     */
    public Integer getCapacidadSala() {
	return capacidadSala;
    }
    /* (non-Javadoc)
     * @see java.lang.Object#toString()
     */
    @Override
    public String toString() {
	return "Sala [idSala=" + idSala + "]";
    }
    /* (non-Javadoc)
     * @see java.lang.Object#hashCode()
     */
    @Override
    public int hashCode() {
	final int prime = 31;
	int result = 1;
	result = prime * result + ((idSala == null) ? 0 : idSala.hashCode());
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
	if (!(obj instanceof Sala)) {
	    return false;
	}
	Sala other = (Sala) obj;
	if (idSala == null) {
	    if (other.idSala != null) {
		return false;
	    }
	} else if (!idSala.equals(other.idSala)) {
	    return false;
	}
	return true;
    }




}
