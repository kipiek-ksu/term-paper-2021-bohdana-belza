program L_1_9;
var a: integer; 
begin
 read(a);
 write(a mod 10);
 write((a mod 100) div 10);
 write((a div 100) mod 10);
 write(a div 1000);
end.