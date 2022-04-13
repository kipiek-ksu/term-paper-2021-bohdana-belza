Program LB5_21;
Var a:string; i:byte;
begin
	Read(a);
	For i:=1 to Pos('.',a) do begin
  	if (ord(a[i])>=48) and (ord(a[i])<=57) then begin
     	delete(a,i,1);
      dec(i);
    end;
    	if a[i]='+' then begin
      	insert('+',a,i);
        inc(i);
      end;
      	if a[i]='-' then begin
        	insert('-',a,i);
          inc(i);
        end;
        end;
  Writeln(a);
end.



