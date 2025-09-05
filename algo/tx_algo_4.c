#include "stdio.h"
#include "math.h"
#include "complex.h"
#include "stdlib.h"
#include "float.h"
typedef long double ld;

ld convertToPositive(ld number) ;
int main( int argc, char *argv[]) { // Z_L_real Z_L_imag Z_0_real Z_0_imag

	long double _Complex Z_L;
	long double _Complex Z_0;
	long double _Complex ratio ;

	long double _Complex volRefCoeff; // voltage reff Coeffiecnt
	argc--;
	if (argc == 4) {
		Z_L = atof(argv[1]) + atof(argv[2])*I;	
		Z_0 = atof(argv[3]) + atof(argv[4])*I;	
		
	} else {
		printf("Insufficient Args");
		return 0;
	}
	ratio = Z_L/Z_0;
	volRefCoeff = (ratio-1)/ (ratio + 1);
printf("{");
printf("\"inputs\":{");
printf("\"z_L\":{\"real\":%.10Le,\"imag\":%.10Le},", creal(Z_L), cimag(Z_L));
printf("\"z_0\":{\"real\":%.10Le,\"imag\":%.10Le}", creal(Z_0), cimag(Z_0));
printf("},");
printf("\"outputs\":{");
printf("\"VoltageRefCoeff\":{\"abs\":%.10Le,\"arg\":%.10Le}", cabs(volRefCoeff), carg(volRefCoeff));
printf("}");
printf("}");

}


ld convertToPositive(ld number) {
	return number >=0 ? number : -1*number;
}
