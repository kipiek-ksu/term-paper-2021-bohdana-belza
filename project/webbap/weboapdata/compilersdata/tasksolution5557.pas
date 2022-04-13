var a,b,c,D: real;


begin
 read(a,b,c);
 if (a=0) and (b=0) and (c=0)
  then write('MANY ANSWERS')
   else begin
    D:=b*b-4*a*c;
    if D >= 0 then write((-b+sqrt(d))/2*a:4:3,' ',(-b-sqrt(d))/2*a:4:3)
              else write('NO ANSWER')
   end;
end.