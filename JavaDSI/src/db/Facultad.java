package db;

import java.sql.ResultSet;
import java.sql.SQLException;

public class Facultad {
    
    private Integer idFacultad;
    private String nombreDepartamento;
    public Facultad(Integer idFacultad, Integer idDepartamento, String nombreDepartamento) {
	
	this.idFacultad = idFacultad;
	this.nombreDepartamento = nombreDepartamento;
    }
    public Facultad(ResultSet datos) {
	try {
	    this.idFacultad = datos.getInt(1);
	    this.nombreDepartamento = datos.getString(2);
	   
	} catch (SQLException e) {
	    // TODO Auto-generated catch block
	    e.printStackTrace();
	}
	
    }
    /**
     * @return the idFacultad
     */
    public Integer getIdFacultad() {
        return idFacultad;
    }
    /**
     * @return the nombreDepartamento
     */
    public String getNombreDepartamento() {
        return nombreDepartamento;
    }
    /* (non-Javadoc)
     * @see java.lang.Object#toString()
     */
    @Override
    public String toString() {
	return "Facultad [idFacultad=" + idFacultad + ", nombreDepartamento=" + nombreDepartamento + "]";
    }
    /* (non-Javadoc)
     * @see java.lang.Object#hashCode()
     */
    @Override
    public int hashCode() {
	final int prime = 31;
	int result = 1;
	result = prime * result + ((idFacultad == null) ? 0 : idFacultad.hashCode());
	result = prime * result + ((nombreDepartamento == null) ? 0 : nombreDepartamento.hashCode());
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
	if (!(obj instanceof Facultad)) {
	    return false;
	}
	Facultad other = (Facultad) obj;
	if (idFacultad == null) {
	    if (other.idFacultad != null) {
		return false;
	    }
	} else if (!idFacultad.equals(other.idFacultad)) {
	    return false;
	}
	if (nombreDepartamento == null) {
	    if (other.nombreDepartamento != null) {
		return false;
	    }
	} else if (!nombreDepartamento.equals(other.nombreDepartamento)) {
	    return false;
	}
	return true;
    }
    
 
    
    

}
