program z8;
var i,n,p,y:integer;
begin 
      read(n);
      p:=(n mod 1000) div 100;
      y:=(n mod 100) div 10;
      i:= n mod 10;
      write('i=',i);
      write('y=',y);
      write('p=',p);
end.