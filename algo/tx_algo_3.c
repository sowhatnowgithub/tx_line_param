#include "stdio.h"
#include "math.h"
#include "complex.h"
#include "stdlib.h"
#include "float.h"
typedef long double ld;

ld convertToPositive(ld number) ;
int main(int argc, char *argv[]) { //omega Z_0 alpha beta 
	ld omega;
	ld phaseVelocity;
	ld alpha;
	ld beta;
	ld Z_0;

	ld Rbar;
	ld Cbar;
	ld Lbar;
	ld Gbar;

	argc--;
	if(argc == 4) {
		omega = convertToPositive(atof(argv[1]));
		Z_0 = convertToPositive(atof(argv[2]));
		alpha = convertToPositive(atof(argv[3]));
		beta = convertToPositive(atof(argv[4]));
	} else {
		printf("Insuffiecient Args");
		return 0;
	}
	phaseVelocity = omega/beta;
	Rbar = alpha * Z_0;
	Gbar = alpha * alpha / Rbar;
	Cbar = beta/(omega*Z_0);
	Lbar = Rbar * Cbar / Gbar;
	printf("{");
printf("\"inputs\":{");
printf("\"omega\":%.10Le,", omega);
printf("\"alpha\":%.10Le,", alpha);
printf("\"beta\":%.10Le,", beta);
printf("\"z_0\":%.10Le", Z_0);
printf("},");
printf("\"outputs\":{");

printf("\"RBar\":%.10Le,", Rbar);
printf("\"GBar\":%.10Le,", Gbar);
printf("\"LBar\":%.10Le,", Lbar);
printf("\"CBar\":%.10Le", Cbar);
printf("}");

printf("}");
	return 0;
} 

ld convertToPositive(ld number) {
return number >= 0 ? number : -1*number;
}
