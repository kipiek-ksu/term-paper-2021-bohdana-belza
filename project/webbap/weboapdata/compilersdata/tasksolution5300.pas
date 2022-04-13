program ercode;
 var a:integer;r1,r2:byte;k:boolean;
begin
 readln(a);k:=true;
 if (a>=1000)and(a<=9999) then
  begin
   r1:=(a mod 10)+((a mod 10000)div 1000);
   r2:=((a mod 100) div 10)+((a mod 1000)div 100);
  end else k:=false;
 if k then writeln('r1=',r1,'   ','r2=',r2) else writeln('Error');
end.
