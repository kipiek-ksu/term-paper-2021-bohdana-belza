Program LB5_21;
Var a:string; i:byte;
begin
	Read(a);
	For i:=1 to Pos('.',a) do
  	if (ord(a[i])>=48) and (ord(a[i])<=57) then begin
     	delete(a,i,1);
      dec(i);
    end
    else
    	if a[i]='+' then begin
      	insert('+',a,i);
        inc(i);
      end
      else
      	if a[i]='-' then begin
        	insert('-',a,i);
          inc(i);
        end;
  Writeln(a);
end.



