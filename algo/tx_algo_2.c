#include "stdio.h"
#include "stdlib.h"
#include "complex.h"
#include "float.h"
#include "math.h"

typedef long double ld;
ld convertToPositive(ld number);
// Finding the L,C for a lossless Tx line
int main(int argc, char *argv[]) { // Z_0 beta omega
	ld Z_0;
	ld beta;
	ld omega;
	argc--;
	ld Cbar;
	ld Lbar;
	if(argc == 3) {
		omega = convertToPositive(atof(argv[1]));
		Z_0 = convertToPositive(atof(argv[2]));
		beta = convertToPositive(atof(argv[3]));
	} else {
		printf("Insuffiecient Args");
		return 0;
	}
	
	Cbar = beta / (omega*Z_0);
	Lbar = Z_0*Z_0*Cbar;
	printf("{");
printf("\"inputs\":{");
printf("\"omega\":%.10Le,", omega);
printf("\"Beta\":%.10Le,", beta);
printf("\"z_0\":%.10Le", Z_0);
printf("},");
printf("\"outputs\":{");
printf("\"LBar\":%.10Le,", Lbar);
printf("\"CBar\":%.10Le", Cbar);
printf("}");

printf("}");
	return 0;
}

ld convertToPositive(ld number) {
	return number >=0 ? number : -1*number;
}
